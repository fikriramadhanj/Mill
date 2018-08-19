;(function($, window, numeral) {
  // Datepicker
  $('.datepicker').datepicker({
    autoclose: true,
    clearBtn: true,
    format: 'yyyy-mm-dd'
  });

  $('.barang-harga-jual').on('change', function () {
    var value = $(this).val();
    $('#form-barang').find('.barang-harga-jual').each(function (el) {
      $(this).val(value);
      console.log($(this).val());
    });
  });
})($, window, numeral);
