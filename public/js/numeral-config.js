;(function ($, window) {
  numeral.register('locale', 'id', {
    delimiters: {
      thousands: '.',
      decimal: ','
    },
    abbreviations: {
      thousand: ' ribu',
      million: ' JT',
      billion: ' M',
      trillion: ' T'
    },
    currency: {
      symbol: 'Rp. '
    }
  });
  // switch between locales
  numeral.locale('id');

  if (typeof window.numeral === 'undefined') {
    window.numeral = numeral;
  }
})($, window);
