angular.module('paging', [])
.value('paging', {
// --------------------------
// ページング関連
// --------------------------
PAGE_DEFAULT_LIMIT : 30,
PAGE_PAGING_LINK_RAGE : 5,
})
.service('pagingService', ['$localStorage' , 'paging', function($localStorage, paging){
    this.getPagingObject = function(cur_page, data_count) {
        var total_page_count = (Math.floor(data_count / paging.PAGE_DEFAULT_LIMIT));
        if ((data_count % paging.PAGE_DEFAULT_LIMIT) != 0) {
            total_page_count++;
        }
        var min_page = 1;
        var max_page = total_page_count;
    
        // 1画面に表示するページ範囲の算出
        // 現在ページを中央値として、定数「PAGE_PAGING_LINK_RAGE」の範囲で表示
        var median = Math.floor(paging.PAGE_PAGING_LINK_RAGE / 2);

        // 表示開始位置を算出
        var start_page = cur_page - median;

        // 表示開始位置が、最小ページ（1）より小さい場合、表示開始位置を1とする
        if (start_page < 1) {
            start_page = min_page;
        } 

        // 表示開始位置から、表示終了位置を算出
        var end_page = start_page + paging.PAGE_PAGING_LINK_RAGE - 1;

        // 表示終了位置が、最大ページ（X）より大きい場合、表示終了位置を最大ページとする
        if (end_page > max_page) {
            end_page = max_page;
        }

        // 算出後の表示範囲が定数「PAGE_PAGING_LINK_RAGE」より小さい場合、加算する
        if (end_page > paging.PAGE_PAGING_LINK_RAGE &&
            (end_page - start_page) < paging.PAGE_PAGING_LINK_RAGE) {
            start_page = end_page - paging.PAGE_PAGING_LINK_RAGE;
        }
    
        var pagingObj = [];
        pagingObj['list'] = [];
        for (i = start_page; i <= end_page; i++) {
            pagingObj['list'].push(i);
        }
        pagingObj["min"] = min_page;
        pagingObj["max"] = max_page;
        pagingObj["start"] = start_page;
        pagingObj["end"] = end_page;

        return pagingObj;
    }
}]);