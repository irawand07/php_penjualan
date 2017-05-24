function dfok(){
	var nama = daftar.nama.value;
	var email = daftar.email.value;
	var username = daftar.username.value;
	var password = daftar.password.value;
	var jl = daftar.jl.value;
	var kota = daftar.kota.value;
	var telp = daftar.telp.value;
	
	if (nama!="" ){
		document.getElementById('nama').className="hijau";
		document.getElementById('nama').innerHTML=' OK';
	};

	if (password!="" ){
		document.getElementById('password').className="hijau";
		document.getElementById('password').innerHTML=' OK';
	};
	if (jl!="" ){
		document.getElementById('jl').className="hijau";
		document.getElementById('jl').innerHTML=' OK';
	};
	if (kota!="" ){
		document.getElementById('kota').className="hijau";
		document.getElementById('kota').innerHTML=' OK';
	};
	if (telp!="" ){
		document.getElementById('telp').className="hijau";
		document.getElementById('telp').innerHTML=' OK';
	};
}
function validasidaftar(){
	var nama = daftar.nama.value;
	var email = daftar.email.value;
	var username = daftar.username.value;
	var password = daftar.password.value;
	var jl = daftar.jl.value;
	var kota = daftar.kota.value;
	var telp = daftar.telp.value;
	
	if (nama=="" || nama==null){
		document.getElementById('nama').className="merah";
		document.getElementById('nama').innerHTML=' (Nama belum diisi)';
		return false;
	};	
	if (email=="" || email==null){
		document.getElementById('email').className="merah";
		document.getElementById('email').innerHTML=' (Email belum diisi)';
		return false;
	};	
	if (username=="" || username==null){
		document.getElementById('username').className="merah";
		document.getElementById('username').innerHTML=' (Username belum diisi)';
		return false;
	};	
	if (password=="" || password==null){
		document.getElementById('password').className="merah";
		document.getElementById('password').innerHTML=' (Password belum diisi)';
		return false;
	};	
	if (jl=="" || jl==null){
		document.getElementById('jl').className="merah";
		document.getElementById('jl').innerHTML=' (Jalan belum diisi)';
		return false;
	};	
	if (kota=="" || kota==null){
		document.getElementById('kota').className="merah";
		document.getElementById('kota').innerHTML=' (kota belum diisi)';
		return false;
	};	
	if (telp=="" || telp==null){
		document.getElementById('telp').className="merah";
		document.getElementById('telp').innerHTML=' (telp belum diisi)';
		return false;
	};	

}


function krok(){
	var nama = kirim.nama.value;
	var jl = kirim.jl.value;
	var kota = kirim.kota.value;
	var telp = kirim.telp.value;
	
	if (nama!="" ){
		document.getElementById('nama').className="hijau";
		document.getElementById('nama').innerHTML=' OK';
	};
	if (jl!="" ){
		document.getElementById('jl').className="hijau";
		document.getElementById('jl').innerHTML=' OK';
	};
	if (kota!="" ){
		document.getElementById('kota').className="hijau";
		document.getElementById('kota').innerHTML=' OK';
	};
	if (telp!="" ){
		document.getElementById('telp').className="hijau";
		document.getElementById('telp').innerHTML=' OK';
	};
}

function validasikirim(){
	var nama = kirim.nama.value;
	var jl = kirim.jl.value;
	var kota = kirim.kota.value;
	var telp = kirim.telp.value;
	
	if (nama=="" || nama==null){
		document.getElementById('nama').className="merah";
		document.getElementById('nama').innerHTML=' (Nama belum diisi)';
		return false;
	};	
	if (jl=="" || jl==null){
		document.getElementById('jl').className="merah";
		document.getElementById('jl').innerHTML=' (Jalan belum diisi)';
		return false;
	};	
	if (kota=="" || kota==null){
		document.getElementById('kota').className="merah";
		document.getElementById('kota').innerHTML=' (kota belum diisi)';
		return false;
	};	
	if (telp=="" || telp==null){
		document.getElementById('telp').className="merah";
		document.getElementById('telp').innerHTML=' (telp belum diisi)';
		return false;
	};	

}