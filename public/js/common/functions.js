function isEmptyStr(str) {
	if (typeof str === 'undefined' || str === "" || str === null) {
		return true;
	} else {
		return false;
	}
}

function pattern_match(pattern, target) {
    let re = new RegExp('^' + pattern + '$', 'u');
    return re.test(target);
}

function getSelectOptionHours() {
    var hours = [];
    for (i = 0; i <= 23; i++) {
        hours.push({"val":i, "label":("0" + String (i)).substr(-2)});
    }
    return hours;
}

function getSelectOptionMinutes() {
    var minutes = [];
    for (i = 0; i <= 59; i++) {
        minutes.push({"val":i, "label":("0" + String (i)).substr(-2)});
    }
    return minutes;
}

function getDateFormat(date, format) {
 
    format = format.replace(/YYYY/, date.getFullYear());
    format = format.replace(/MM/, zero_pad(String(date.getMonth() + 1), 2));
    format = format.replace(/DD/, zero_pad(String(date.getDate()), 2));
 
    return format;
}

function getStrDateFormat(strDate, format) {
    if (isEmptyStr(strDate)) {
        return "";
    }
    var replace = replaceAll(strDate, '-', '/');
    var date = new Date(replace);
    format = format.replace(/YYYY/, date.getFullYear());
    format = format.replace(/MM/, zero_pad(String(date.getMonth() + 1), 2));
    format = format.replace(/DD/, zero_pad(String(date.getDate()), 2));
 
    return format;
}

function zero_pad(text, len) {
    if (len === undefined) {
        // デフォルトは2桁
        len = 2;
      }
    var target = "0".repeat(len) + text;
    return target.slice( 0-len );
}

function listInValue(list, key, val) {
    if (list.length == 0) {
        return false;
    }

    for(let l in list) {
        if (list[l][key] && list[l][key] === val) {
            return true;
        }
    }
    return false;

}

function trasFileForBase64(data_url_scheme) {
    if (typeof data_url_scheme === "undefined" || data_url_scheme === "") {
        return "";
    }
    // データURLスキームからbase64形式のバイナリデータに変換する
    base64 = btoa(data_url_scheme);
    base64.replace(/^.*,/, '');

    return base64;
}
function trasFileForBase64_2(data_url_scheme) {
    if (typeof data_url_scheme === "undefined" || data_url_scheme === "") {
        return "";
    }
    const regex = /data:[^,]+,/i;
    base64 = data_url_scheme.replace(regex, "");

    return base64;
}

function chkEmptyStr(str) {
	if (typeof str === 'undefined' || str === "" || str === null) {
		return "";
	} else {
        return str;
	}
}

function chkEmptyNum(num) {
	if (typeof num === 'undefined' || num === "" || num === null) {
		return 0;
	} else {
		return num;
	}
}

function getAddDate(dt, addDateCount) {
    var retDt = new Date(dt);
    return new Date(retDt.setDate(retDt.getDate() + addDateCount));
}

function getAddMonth(dt, addMonthCount) {
    var retDt = new Date(dt);
    return new Date(retDt.setMonth(retDt.getMonth() + addMonthCount));
}

function getNextMonth(dt) {
    // 月末日を超えてしまう場合は、月末日に寄せる
    var retDt = new Date(dt);
    var target = new Date(retDt.setMonth(retDt.getMonth() + 1));
    if (target.getMonth() - retDt.getMonth() > 1) {
        return new Date(retDt.getFullYear(), retDt.getMonth() + 1, 0);
    }
    return target;
}

function stringToDate(str, delim) {
    if (typeof str === "undefined" || str === null) {
        return "";
    }
    
    var arr = str.split(delim)
    if (arr.length == 1) {
        return new Date(arr[0]);
    } else if (arr.length == 2) {
        return new Date(arr[0], arr[1] - 1);
    } else {
        return new Date(arr[0], arr[1] - 1, arr[2]);
    }
}

function replaceAll(str, beforeStr, afterStr){
    if (typeof str === "undefined" || str === null) {
        return "";
    } else {
        var reg = new RegExp(beforeStr, "g");
        return str.replace(reg, afterStr);
    }
}
    
function array_key_exists (key, search) {
    if (!search || (search.constructor !== Array && search.constructor !== Object)) {
        return false;
    }
 
    return key in search;
}

function convertKanaToHelf(str) {
    var kanaMap = {
         "ガ": "ｶﾞ", "ギ": "ｷﾞ", "グ": "ｸﾞ", "ゲ": "ｹﾞ", "ゴ": "ｺﾞ",
         "ザ": "ｻﾞ", "ジ": "ｼﾞ", "ズ": "ｽﾞ", "ゼ": "ｾﾞ", "ゾ": "ｿﾞ",
         "ダ": "ﾀﾞ", "ヂ": "ﾁﾞ", "ヅ": "ﾂﾞ", "デ": "ﾃﾞ", "ド": "ﾄﾞ",
         "バ": "ﾊﾞ", "ビ": "ﾋﾞ", "ブ": "ﾌﾞ", "ベ": "ﾍﾞ", "ボ": "ﾎﾞ",
         "パ": "ﾊﾟ", "ピ": "ﾋﾟ", "プ": "ﾌﾟ", "ペ": "ﾍﾟ", "ポ": "ﾎﾟ",
         "ヴ": "ｳﾞ", "ヷ": "ﾜﾞ", "ヺ": "ｦﾞ",
         "ア": "ｱ", "イ": "ｲ", "ウ": "ｳ", "エ": "ｴ", "オ": "ｵ",
         "カ": "ｶ", "キ": "ｷ", "ク": "ｸ", "ケ": "ｹ", "コ": "ｺ",
         "サ": "ｻ", "シ": "ｼ", "ス": "ｽ", "セ": "ｾ", "ソ": "ｿ",
         "タ": "ﾀ", "チ": "ﾁ", "ツ": "ﾂ", "テ": "ﾃ", "ト": "ﾄ",
         "ナ": "ﾅ", "ニ": "ﾆ", "ヌ": "ﾇ", "ネ": "ﾈ", "ノ": "ﾉ",
         "ハ": "ﾊ", "ヒ": "ﾋ", "フ": "ﾌ", "ヘ": "ﾍ", "ホ": "ﾎ",
         "マ": "ﾏ", "ミ": "ﾐ", "ム": "ﾑ", "メ": "ﾒ", "モ": "ﾓ",
         "ヤ": "ﾔ", "ユ": "ﾕ", "ヨ": "ﾖ",
         "ラ": "ﾗ", "リ": "ﾘ", "ル": "ﾙ", "レ": "ﾚ", "ロ": "ﾛ",
         "ワ": "ﾜ", "ヲ": "ｦ", "ン": "ﾝ",
         "ァ": "ｧ", "ィ": "ｨ", "ゥ": "ｩ", "ェ": "ｪ", "ォ": "ｫ",
         "ッ": "ｯ", "ャ": "ｬ", "ュ": "ｭ", "ョ": "ｮ",
         "。": "｡", "、": "､", "ー": "ｰ", "「": "｢", "」": "｣", "・": "･"
    }
    var reg = new RegExp('(' + Object.keys(kanaMap).join('|') + ')', 'g');
    return str
            .replace(reg, function (match) {
                return kanaMap[match];
            })
            .replace(/゛/g, 'ﾞ')
            .replace(/゜/g, 'ﾟ');
};

function DeleteNewLine(myLen) {
    var newLen = '';
    for(var i=0; i<myLen.length; i++){
        text = escape(myLen.substring(i, i+1));
        if(text != "%0D" && text != "%0A"){
            newLen += myLen.substring(i, i+1);
        }
    }
    return(newLen);
}

function toBlob(base64, mime_ctype) {
    // 日本語の文字化けに対処するためBOMを作成する。
    var bom = new Uint8Array([0xEF, 0xBB, 0xBF]);

    var bin = atob(base64.replace(/^.*,/, ''));
    var buffer = new Uint8Array(bin.length);
    for (var i = 0; i < bin.length; i++) {
        buffer[i] = bin.charCodeAt(i);
    }
    // Blobを作成
    try {
        var blob = new Blob([bom, buffer.buffer], {
            type: mime_ctype,
        });
    } catch (e) {
        return false;
    }
    return blob;
}