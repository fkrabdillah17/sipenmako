function hitung()
      {
        var harga = (document.getElementById('harga').value == '' ? 0:document.getElementById('harga').value);
        var kuantitas = (document.getElementById('kuantitas').value == '' ? 0:document.getElementById('kuantitas').value);

        var result = (parseInt(harga) * h_harga) + (parseInt(kuantitas) * h_kuantitas);
        if (!isNaN(result)) {
           document.getElementById('jmlharga').value = result;
        }
      }

function sum() {
        var txtFirstNumberValue = document.getElementById('harga').value;
        var txtSecondNumberValue = document.getElementById('kuantitas').value;
        var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
           document.getElementById('jmlharga').value = result;
        }
  }

function jumlah()
      {
        var harga = (document.getElementById('harga').value == '' ? 0:document.getElementById('harga').value);
        var kuantitas = (document.getElementById('kuantitas').value == '' ? 0:document.getElementById('kuantitas').value);

        var result = (parseInt(harga) * h_harga) + (parseInt(kuantitas) * h_kuantitas);
        if (!isNaN(result)) {
           document.getElementById('jmlharga').value = result;
        }
      }
