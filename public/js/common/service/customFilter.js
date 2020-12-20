angular.module('customFilter', [
])
.filter('pad_0', function () {
    return function (text, len) {
      return zero_pad(text, len);
    };
})
.filter('abbreviate', function () {
    return function (text, len, end) {
      if (len === undefined) {
        // デフォルトは10文字
        len = 10;
      }
      if (end === undefined) {
        end = "…";
      }
      if(text !== undefined) {
        if(text.length > len) {
          return text.substring(0, len - 1) + end;
        }
        else {
          return text;
        }
      }
    };
})
.filter('cost_rate', function () {
  return function (text, price) {
    if (price <= 0) {
      return 0.00;
    }

    var delivery_unit_price = parseFloat(text);
    var tmp_price = parseFloat(price);

    if (isNaN(delivery_unit_price) || isNaN(tmp_price)) {
      return 0.00;
    }
    
    var cost_rate = delivery_unit_price * 100 / tmp_price;
    cost_rate = Math.floor(cost_rate * 100) / 100;
      return cost_rate;
  };
})
.filter('nl2br', function($sce) {
  return function(input) {
      if (input) {
          var replaced = input.replace(/(\r\n|\n|\r)/g, "\r\n")
          return $sce.trustAsHtml(replaced);
      }
      return input;
  }
})
.filter('cint', function() {
  return function(string) {
    if (!pattern_match('[0-9]+', string)) {
      return parseInt(string, 10);
    } else {
      return 0;
    }
  }
})
.filter('cfloat', function() {
  return function(string) {
    if (!pattern_match('([1-9]\d*|0)(\.\d+)?', string)) {
      return parseFloat(string);
    } else {
      return 0.00;
    }
  }
});