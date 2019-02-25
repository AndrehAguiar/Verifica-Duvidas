// JavaScript Document

var url_string = document.location;
var url = new URL(url_string);

var categoria = url.searchParams.get("categoria");
if(categoria !== null){
var a = document.getElementById(categoria);
	a.style.backgroundColor = "#9C0";
	a.style.color = "#333";
}

var interesse = url.searchParams.get("interesse");	
if (interesse === "novo"){
	var k = document.getElementById("btnInteresses");
	var s = document.getElementById("btnPerguntas");
	var w = document.getElementById("userPerguntas");
	
	k.style.backgroundColor = "#9C0";
	k.style.color = "#333";
	
	w.style.display = "none";
	s.style.backgroundColor = "#060";
	s.style.color = "#FFF";
}

function showRel_area() {
	var x = document.getElementById("rel_area");
	var y = document.getElementById("btnRel_area");
	if (x.style.display === "none") {
		x.style.display = "block";
		y.style.backgroundColor = "#9C0";
		y.style.color = "#333";
	} else {
		x.style.display = "none";
		y.style.backgroundColor = "#060";
		y.style.color = "#FFF";
	}
}

function showRel_materia() {
	var x = document.getElementById("rel_materia");
	var y = document.getElementById("btnRel_materia");
	if (x.style.display === "none") {
		x.style.display = "block";
		y.style.backgroundColor = "#9C0";
		y.style.color = "#333";
	} else {
		x.style.display = "none";
		y.style.backgroundColor = "#060";
		y.style.color = "#FFF";
	}
}

function showIndicadores() {
	var x = document.getElementById("indicador");
	var y = document.getElementById("btnIndicador");
	if (x.style.display === "none") {
		x.style.display = "block";
		y.style.backgroundColor = "#9C0";
		y.style.color = "#333";
	} else {
		x.style.display = "none";
		y.style.backgroundColor = "#060";
		y.style.color = "#FFF";
	}
}

function showGraficos() {
	var x = document.getElementById("graficos");
	var y = document.getElementById("btnGraficos");
	if (x.style.display === "none") {
		x.style.display = "block";
		y.style.backgroundColor = "#9C0";
		y.style.color = "#333";
	} else {
		x.style.display = "none";
		y.style.backgroundColor = "#060";
		y.style.color = "#FFF";
	}
}

function showPerguntas() {
	
	var s = document.getElementById("btnPerguntas");
	var w = document.getElementById("userPerguntas");
	
	var u = document.getElementById("btnRespostas");
	var x = document.getElementById("userRespostas");
	
	var m = document.getElementById("btnComentarios");
	var n = document.getElementById("userComentarios");
	
	var z = document.getElementById("btnCadastro");
	var y = document.getElementById("cadastro");
	
	var k = document.getElementById("btnInteresses");
	var l = document.getElementById("interesses");
	
	if (w.style.display === "none") {
		
		w.style.display = "block";
		s.style.backgroundColor = "#9C0";
		s.style.color = "#333";
		
		x.style.display = "none";
		u.style.backgroundColor = "#060";
		u.style.color = "#FFF";
		
		n.style.display = "none";		
		m.style.backgroundColor = "#060";
		m.style.color = "#FFF";
		
		l.style.display = "none";
		k.style.backgroundColor = "#060";
		k.style.color = "#FFF";
		
		y.style.display = "none";
		z.style.backgroundColor = "#060";
		z.style.color = "#FFF";
	} else {
		w.style.display = "block";
	}
}

function showRespostas() {
	
	var s = document.getElementById("btnPerguntas");
	var w = document.getElementById("userPerguntas");
	
	var u = document.getElementById("btnRespostas");
	var x = document.getElementById("userRespostas");
	
	var m = document.getElementById("btnComentarios");
	var n = document.getElementById("userComentarios");
	
	var z = document.getElementById("btnCadastro");
	var y = document.getElementById("cadastro");
	
	var k = document.getElementById("btnInteresses");
	var l = document.getElementById("interesses");
	
	if (x.style.display === "none") {
		
		x.style.display = "block";
		u.style.backgroundColor = "#9C0";
		u.style.color = "#333";
		
		w.style.display = "none";
		s.style.backgroundColor = "#060";
		s.style.color = "#FFF";
		
		n.style.display = "none";		
		m.style.backgroundColor = "#060";
		m.style.color = "#FFF";
		
		y.style.display = "none";
		z.style.backgroundColor = "#060";
		z.style.color = "#FFF";
		
		l.style.display = "none";
		k.style.backgroundColor = "#060";
		k.style.color = "#FFF";
	} else {
		x.style.display = "none";
		u.style.backgroundColor = "#060";
		u.style.color = "#FFF";
		
		w.style.display = "block";
		s.style.backgroundColor = "#9C0";
		s.style.color = "#333";
	}
}

function showComentarios() {
	
	var s = document.getElementById("btnPerguntas");
	var w = document.getElementById("userPerguntas");
	
	var u = document.getElementById("btnRespostas");
	var x = document.getElementById("userRespostas");
	
	var m = document.getElementById("btnComentarios");
	var n = document.getElementById("userComentarios");
	
	var z = document.getElementById("btnCadastro");
	var y = document.getElementById("cadastro");
	
	var k = document.getElementById("btnInteresses");
	var l = document.getElementById("interesses");
	
	if (n.style.display === "none") {
		
		n.style.display = "block";
		m.style.backgroundColor = "#9C0";
		m.style.color = "#333";
		
		x.style.display = "none";		
		u.style.backgroundColor = "#060";
		u.style.color = "#FFF";
		
		y.style.display = "none";
		z.style.backgroundColor = "#060";
		z.style.color = "#FFF";	
		
		w.style.display = "none";		
		s.style.backgroundColor = "#060";
		s.style.color = "#FFF";	
		
		k.style.backgroundColor = "#060";
		k.style.color = "#FFF";		
		l.style.display = "none";
	} else {		
		n.style.display = "none";
		m.style.backgroundColor = "#060";
		m.style.color = "#FFF";
		
		w.style.display = "block";
		s.style.backgroundColor = "#9C0";
		s.style.color = "#333";
	}
}

function showCadastro() {
	
	var s = document.getElementById("btnPerguntas");
	var w = document.getElementById("userPerguntas");
	
	var u = document.getElementById("btnRespostas");
	var x = document.getElementById("userRespostas");
	
	var m = document.getElementById("btnComentarios");
	var n = document.getElementById("userComentarios");
	
	var z = document.getElementById("btnCadastro");
	var y = document.getElementById("cadastro");
	
	var k = document.getElementById("btnInteresses");
	var l = document.getElementById("interesses");
	
	if (y.style.display === "none") {
		
		y.style.display = "block";
		z.style.backgroundColor = "#9C0";
		z.style.color = "#333";
		
		w.style.display = "none";
		s.style.backgroundColor = "#060";
		s.style.color = "#FFF";
		
		x.style.display = "none";
		u.style.backgroundColor = "#060";
		u.style.color = "#FFF";
		
		n.style.display = "none";
		m.style.backgroundColor = "#060";
		m.style.color = "#FFF";
		
		k.style.backgroundColor = "#060";
		k.style.color = "#FFF";		
		l.style.display = "none";
	} else {
		y.style.display = "none";
		z.style.backgroundColor = "#060";
		z.style.color = "#FFF";
		
		w.style.display = "block";
		s.style.backgroundColor = "#9C0";
		s.style.color = "#333";
	}
}

function showInteresses() {
	
	var s = document.getElementById("btnPerguntas");
	var w = document.getElementById("userPerguntas");
	
	var u = document.getElementById("btnRespostas");
	var x = document.getElementById("userRespostas");
	
	var m = document.getElementById("btnComentarios");
	var n = document.getElementById("userComentarios");
	
	var z = document.getElementById("btnCadastro");
	var y = document.getElementById("cadastro");
	
	var k = document.getElementById("btnInteresses");
	var l = document.getElementById("interesses");
	
	if (l.style.display === "none") {
		
		l.style.display = "block";		
		k.style.backgroundColor = "#9C0";
		k.style.color = "#333";	
		
		y.style.display = "none";
		z.style.backgroundColor = "#060";
		z.style.color = "#FFF";
		
		w.style.display = "none";
		s.style.backgroundColor = "#060";
		s.style.color = "#FFF";
		
		x.style.display = "none";
		u.style.backgroundColor = "#060";
		u.style.color = "#FFF";
		
		n.style.display = "none";
		m.style.backgroundColor = "#060";
		m.style.color = "#FFF";	
	} else {
		l.style.display = "none";
		k.style.backgroundColor = "#060";
		k.style.color = "#FFF";
		
		w.style.display = "block";
		s.style.backgroundColor = "#9C0";
		s.style.color = "#333";
	}
}
