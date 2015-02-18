// reload captcha
void function () {

$(document).off('click.captcha')
.on('click.captcha', '.captcha img:not(.loading)', function () {
  var t = $.now()

  var $img = $(this)
  .addClass('loading')
  .one('load error', function () {
    $img.removeClass('loading')
  })
  .attr('src', '/captcha?t=' + t)
  .attr('srcset', '/captcha/2x?t=' + t + ' 2x')
})

// tooltip
$(function () {
  $('.captcha img').tooltip()
})
}();
