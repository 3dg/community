// reload captcha
void function () {

$(document).off('click.captcha')
.on('click.captcha', '.captcha img:not(.loading)', function () {
  var t = $.now()
  var $img = $('<img src="/captcha?t=' + t + '" srcset="/captcha/2x?t=' + t + ' 2x">')
  $(this).replaceWith($img)

  $img.addClass('loading')
  .one('load error', function () {
    $img.removeClass('loading')
  })
})

// tooltip
$(function () {
  $('.captcha img').tooltip()
})
}();
