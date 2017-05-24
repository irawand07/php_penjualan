
function agok(){
	var nama = agen.nama_agen.value;
	if (nama!="" ){
		document.getElementById('nama').className="hijau";
		document.getElementById('nama').innerHTML=' OK';
	}
}
function validasiagen(){
	var nama = agen.nama_agen.value;
	if (nama=="" || nama==null){
		document.getElementById('nama').className="merah";
		document.getElementById('nama').innerHTML=' (Nama agen belum diisi)';
		return false;
	}
}
function mkok(){
	var nama = makanan.nama_makanan.value;
	var harga = makanan.harga.value;
	if (nama!="" ){
		document.getElementById('nama').className="hijau";
		document.getElementById('nama').innerHTML=' OK';
	}
	if (harga!=""){
		document.getElementById('harga').className="hijau";
		document.getElementById('harga').innerHTML=' OK';
	}
}

function validasimakanan(){
	var nama = makanan.nama_makanan.value;
	var harga = makanan.harga.value;
	if (nama=="" || nama==null){
		document.getElementById('nama').className="merah";
		document.getElementById('nama').innerHTML=' (Nama makanan belum diisi)';
		return false;
	}
	if (harga=="" || harga==null){
		document.getElementById('harga').className="merah";
		document.getElementById('harga').innerHTML=' (Harga belum diisi)';
		return false;
	}	
}
