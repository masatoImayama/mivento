angular.module('validation', [])
.service('validation', function(){
    this.validate = function($target, params) {
        var error = {};
        for(let key in params) {
            // 必須チェック
            if (params[key].required && isEmptyStr($target[key])) {
                if (typeof params[key].type !== 'undefined' && (
                    params[key].type === 'radio' || params[key].type === 'select')) {
                    error[key] = params[key].display_name + "を選択してください。";
                } else {
                    error[key] = params[key].display_name + "を入力してください。";
                }
                continue;
            } else if (params[key].required === false && isEmptyStr($target[key])) {
                // 必須ではない項目で空の場合はチェックをスルー
                continue;
            }
    
            // 入力形式チェック
            if (typeof params[key].format !== 'undefined' && params[key].format !== "") {
                var format = params[key].format;
                // ymd
                if (format === 'ymd' && !pattern_match('(\\d{4})\-(\\d{2})\-(\\d{2})', $target[key])) {
                    error[key] = params[key].display_name + "は年月日形式で入力してください。";
                    continue;
                }
                // ym
                if (format === 'ym' && !pattern_match('(\\d{4})\-(\\d{2})', $target[key])) {
                    error[key] = params[key].display_name + "は年月形式で入力してください。";
                    continue;
                }
    
                // phone
                if (format === 'phone') {
                    if (!(pattern_match('0\\d{1,4}-\\d{1,4}-\\d{3,4}', $target[key]) || pattern_match('0[0-9]+', $target[key]))) {
                        error[key] = params[key].display_name + "は電話番号形式で入力してください。";
                        continue;
                    }
                }
    
                // fax
                if (format === 'fax') {
                    if (!(pattern_match('0\\d{1,4}-\\d{1,4}-\\d{3,4}', $target[key]) || pattern_match('0[0-9]+', $target[key]))) {
                        error[key] = params[key].display_name + "はFAX番号形式で入力してください。";
                        continue;
                    }
                }
    
                // email
                if (format === 'email' && !pattern_match('[A-Za-z0-9]{1}[A-Za-z0-9_.-]*@{1}[A-Za-z0-9_.-]{1,}\\.[A-Za-z0-9]{1,}', $target[key])) {
                    error[key] = params[key].display_name + "はメールアドレス形式で入力してください。";
                    continue;
                }
    
                // postcode
                if (format === 'postcode' && !pattern_match('\\d{3}[-]?\\d{4}', $target[key])) {
                    error[key] = params[key].display_name + "は郵便番号形式で入力してください。";
                    continue;
                }
    
                // number (数値のみ)
                if (format === 'number') {
                    if (!pattern_match('[0-9]+', $target[key])) {
                        error[key] = params[key].display_name + "は数字のみで入力してください。";
                        continue;
                    } else if ((typeof params[key].max !== 'undefined' && $target[key] > params[key].max) ||
                                (typeof params[key].min !== 'undefined' && $target[key] < params[key].min)) {
                        var err = [];
                        if (typeof params[key].min !== 'undefined') {
                            err.push(params[key].min);
                        }
                        if (typeof params[key].max !== 'undefined') {
                            err.push(params[key].max);
                        }
                        error[key] = params[key].display_name + "は" + err.join('～') + "までで入力してください。";
                        continue;
                    }
                }
    
                // alphanum （英数のみ）
                if (format === 'alphanum' && !pattern_match('[A-Za-z0-9]+', $target[key])) {
                    error[key] = params[key].display_name + "は英数のみで入力してください。";
                    continue;
                }
    
                // alpahnum_symbol (英数記号のみ)
                if (format === 'alpahnum_symbol' && !pattern_match('[a-zA-Z0-9!-/:-@¥[-`{-~]+', $target[key])) {
                    error[key] = params[key].display_name + "は英数記号のみで入力してください。";
                    continue;
                }

                // TODO:ファイルサイズチェック　未テスト
                // if (format === 'file') {
                //     if (params[key].max_size > params[key].size) {
                //         error[key] = params[key].display_name + "のファイルサイズが大きすぎます。";
                //         continue;
                //     }
                // }
                
            }
    
            // 桁数チェック
            if ((typeof params[key].maxlength !== 'undefined' && $target[key].length > params[key].maxlength) ||
                (typeof params[key].minlength !== 'undefined' && $target[key].length < params[key].minlength)) {
                    var err = [];
                    if (typeof params[key].minlength !== 'undefined') {
                        err.push(params[key].minlength + "文字以上");
                    }
                    if (typeof params[key].maxlength !== 'undefined') {
                        err.push(params[key].maxlength + "文字以下");
                    }
                    error[key] = params[key].display_name + "は" + err.join('') + "で入力してください。";
            }
    
            // サロゲートペア文字チェック
            if (chkSurrogatePair($target[key])) {
                error[key] = params[key].display_name + "に登録できない文字が含まれています。";
                continue;
            }
    
        }
        return error;
    }

    /**
    * サロゲートペアが含まれているかをチェックする
    * 検査対象文字が上位もしくは下位サロゲートであればtrueを返す
    */
    function chkSurrogatePair(str) {
        if (isEmptyStr(str)) {
            return false;
        }

        for ( var i = 0; i < str.length; i++) {
            var c = str.charCodeAt(i);
            if ((0xD800 <= c && c <= 0xDBFF) || (0xDC00 <= c && c <= 0xDFFF)) { 
                return true; 
            }
        }
        return false;
    }

    this.isDecimal = function(target, point) {
        if (point === undefined) {
            point = 0;
        }
        var pattern = "([0-9]+|0)";
        if (point > 0) {
            pattern += "(\.[0-9]{1,"+ point +"}|)";
        }
        return pattern_match(pattern, String(target));
    }
});

