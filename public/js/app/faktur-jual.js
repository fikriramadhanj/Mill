;(function($, window, numeral) {
  function changeTempoDuration () {
    var elDateFaktur = $('.fj-tanggal-faktur');
    var elDateJatuhTempo = $('.fj-tanggal-jatuh-tempo');

    var startDate = moment(elDateFaktur.datepicker('getDate'));
    var endDate = moment(elDateJatuhTempo.datepicker('getDate'));
    
    var duration = endDate.diff(startDate, 'days');
    if (startDate.isSameOrAfter(endDate)) {
      elDateJatuhTempo.datepicker('update', startDate.format('YYYY-MM-DD'));
      duration = 0;
    }
    $('#fj-tempo-bayar').val(duration);
  }

  function editRowBeforeAppend(clonedRow, index) {
    var changes = [
      {
        className: '.fj-hapus-barang',
        attr: 'data-index',
        value: index,
        type: 'button'
      },
      {
        className: '.barang-subtotal-input',
        attr: 'name',
        value: `detilJual[${index}][subTotal]`,
        type: 'input'
      },
      {
        className: '.select-barang',
        attr: 'name',
        value: `detilJual[${index}][barangId]`,
        type: 'select'
      },
      {
        className: '.barang-qty-input',
        attr: 'name',
        value: `detilJual[${index}][qty]`,
        type: 'inputNumber'
      },
      {
        className: '.barang-nama',
        attr: 'data-nominal',
        value: '0',
        type: 'dataName'
      },
      {
        className: '.barang-kode',
        attr: 'data-nominal',
        value: '0',
        type: 'dataName'
      },
      {
        className: '.barang-harga',
        attr: 'data-nominal',
        value: '0',
        type: 'dataNominal'
      },
      {
        className: '.barang-subtotal',
        attr: 'data-nominal',
        value: '0',
        type: 'dataNominal'
      }
    ];

    changes.forEach(function (change) {
      var el = clonedRow.find(change.className);
      el.attr(change.attr, change.value);
      
      // Reset
      if (['input', 'select'].indexOf(change.type) > -1) {
        el.val('');
      } else if (change.type === 'inputNumber') {        
        el.val('1');
      } else if (change.type === 'dataName') {
        el.html('-');
      } else if (change.type === 'dataNominal') {
        el.html('Rp. 0,00');
      }
    });

    clonedRow.find('.barang-index').html(index + 1);

    return clonedRow;
  }

  function editRowsBeforeDelete(elRows, indexToDelete) {
    $.each(elRows, function (indexRow) {
      if (indexRow > indexToDelete) {
        var elRow = $(this);
        var changedRow = editRowBeforeAppend(elRow, indexRow - 1);
      }
    });
  }

  function changeSubTotalRow (parent) {
    var elHarga = parent.find('.barang-harga');
    var elQty = parent.find('.barang-qty-input');
    
    var valueHarga = elHarga.attr('data-nominal');
    var valueQty = elQty.val();
    
    if (valueHarga && valueQty) {
      var subTotalValue = parseInt(valueHarga) * parseInt(valueQty);
      var subTotalNominal = numeral(subTotalValue).format('$0,0.00');
  
      // Subtotal text
      var elSubTotalText = parent.find('.barang-subtotal');
      elSubTotalText.attr('data-nominal', subTotalValue);
      elSubTotalText.html(subTotalNominal);
  
      // Subtotal input
      var elSubTotalInput = parent.find('.barang-subtotal-input');
      elSubTotalInput.val(subTotalValue);
    }
  }

  function calculateTotal() {
    var total = {
      qty: {
        el: $('#faktur-jual-total-qty'),
        formatter: function (a) { return a; },
        value: 0
      },
      subTotal: {
        el: $('#faktur-jual-total-subTotal'),
        formatter: function (a) {
          return numeral(a).format('$0,0.00');
        },
        value: 0
      },
    }
    
    $('.barang-row').each(function () {
      var elRow = $(this);

      var rowChecks = {
        qty: {
          el: elRow.find('.barang-qty input'),
          valueAttr: 'value',
        },
        subTotal: {
          el: elRow.find('.barang-subtotal'),
          valueAttr: 'data-nominal'
        }
      };

      Object.keys(rowChecks).forEach(function (rowCheck) {
        var elRowCheck = rowChecks[rowCheck].el;
        var attrRowCheck = rowChecks[rowCheck].valueAttr;

        var value = attrRowCheck === 'value'
          ? elRowCheck.val()
          : elRowCheck.attr(attrRowCheck);
        if (value) {
          total[rowCheck].value += parseInt(value, 10);
        }
      });
    });

    Object.keys(total).forEach(function (totalKey) {
      var elTotal = total[totalKey].el;
      var valueTotal = total[totalKey].value;
      var formatterTotal = total[totalKey].formatter;
      elTotal.attr('data-nominal', valueTotal);
      elTotal.html(formatterTotal(valueTotal));
    });
  }

  $('.select-barang').on('change', function() {
    var el = $(this);
    var data = el.find(':selected').data();
    var parent = el.parents('.barang-row');

    var changes = {
      nama: {
        el: parent.find('.barang-nama'),
        formatter: function (a) { return a; },
        value: null
      },
      kode: {
        el: parent.find('.barang-kode'),
        formatter: function (a) { return a; },
        value: null
      },
      harga: {
        el: parent.find('.barang-harga'),
        formatter: function (a) {
          return numeral(a).format('$0,0.00');
        },
        value: null
      },
    };

    Object.keys(changes).forEach(change => {
      var elChange = changes[change].el;
      var formatter = changes[change].formatter;
      elChange.html(formatter(data[change]));
      elChange.attr('data-nominal', data[change]);
      changes[change].value = data[change];
    });

    // Subtotal
    changeSubTotalRow(parent);
    
    // Calculate total
    calculateTotal();
  })

  // On Change Input Qty
  $('.barang-qty-input').on('keyup change', function () {
    var el = $(this);
    var val = el.val();
    if (val && val.length > 0 && val !== '0') {
      var parent = el.parents('.barang-row');
      changeSubTotalRow(parent);
      calculateTotal();
    }
  });


  // On Click Tambah Barang
  $('.fj-tambah-barang').on('click', function () {
    var elTableBody = $('#fj-barang-list');
    var elTableRows = elTableBody.find('.barang-row');
    var rowToClone = elTableRows.first();
    var clonedRow = rowToClone.clone(true, true);

    var clonedRow = editRowBeforeAppend(clonedRow, elTableRows.length);
    clonedRow.appendTo(elTableBody);
  });

  // On Click Hapus Barang
  $('.fj-hapus-barang').on('click', function () {
    var el = $(this);
    var elRow = el.parents('.barang-row');
    var indexToDelete = el.data('index');
    var elTableBody = $('#fj-barang-list');
    var elTableRows = elTableBody.find('.barang-row');
  
    if (elTableRows.length > 1) {
      editRowsBeforeDelete(elTableRows, indexToDelete);
      elRow.remove();
    }
  });

  // Datepicker
  $('.datepicker').datepicker({
    autoclose: true,
    clearBtn: true,
    format: 'yyyy-mm-dd'
  });

  // Tanggal Faktur
  $('.fj-tanggal-faktur').on('changeDate', function (e) {
    changeTempoDuration();
  });

  $('.fj-tanggal-jatuh-tempo').on('changeDate', function () {
    changeTempoDuration();
  });

})($, window, numeral);
