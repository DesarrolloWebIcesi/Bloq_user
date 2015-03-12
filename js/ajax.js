function crearXMLHttpRequest()
{
    var xmlHttp = null;
    if (window.ActiveXObject)
        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
    else
    if (window.XMLHttpRequest)
        xmlHttp = new XMLHttpRequest();
    return xmlHttp;
}

function consultar()
{
    var usuario = document.getElementById("identificacion");
    var boton = document.getElementById('bloquear');
   
    var identificacion = usuario.value;
    
    var boton2 = document.getElementById('analizar');
    var separate = boton2.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    console.log(img);
    if(img!=='analizar_click.jpg)'){
         respuesta = document.getElementById("tablas_joomla");
    conexion = crearXMLHttpRequest();
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = conexion.responseText;
            document.getElementById("identificacion").disabled = true;

            if (identificacion == "") {
                boton.style.backgroundImage = 'url("../img/bloquear_click.jpg")';
            }
            else {
                boton.style.backgroundImage = 'url("../img/bloquear.jpg")';
            }

        }


        else
        {
            respuesta.innerHTML = 'Cargando...';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
    conexion.open('GET', '../php/analizar.php?identificacion=' + identificacion, true);
    conexion.send(null);
    }
}

function bloquear()
{
    var boton = document.getElementById('bloquear');
   
    var separate = boton.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    console.log(img + " " + boton.style.backgroundImage);
    if (img === 'bloquear.jpg)') {
         respuesta = document.getElementById("respuesta");
        var arreglo = new Array();
        var usuario = document.getElementById("identificacion");
        var identificacion = usuario.value;
        var contador = 0;
        var row = document.getElementsByName('paginas[]');
        conexion = crearXMLHttpRequest();
        for (var i = 0; i < row.length; i++) {
            if (row[i].checked == true) {
                arreglo[contador] = row[i].value;
                contador++;
            }
        }
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                respuesta.innerHTML = conexion.responseText;
            }
            else
            {
                respuesta.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../php/paginas.php?identificacion=' + identificacion + "&paginas=" + arreglo, true);
        conexion.send(null);
    }

}

function nuevaBusqueda() {
    var boton2 = document.getElementById('Nueva_Busqueda');
     var separate = boton2.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    if(img!=='Nueva_Busqueda_click.jpg)'){
    var boton = document.getElementById('bloquear');
    boton.style.backgroundImage = 'url("../img/bloquear_click.jpg")';
    respuesta = document.getElementById("respuesta");
    respuesta.innerHTML = "";
    respuesta = document.getElementById("tablas_joomla");
    respuesta.innerHTML = "";
    usuario = document.getElementById("identificacion");
    usuario.value = "";
    document.getElementById("identificacion").disabled = false;
    }

}
function nuevaBusqueda2() {
    if(respuesta = document.getElementById("response2")){
        respuesta.innerHTML = "";
    }
    respuesta = document.getElementById("tablas_joomla2");
    respuesta.innerHTML = "";
    usuario = document.getElementById("identificacion");
    usuario.value = "";
    document.getElementById("identificacion").disabled = false;

}

function abrir_sgs() {
    var joomla = document.getElementById('bar_joom');
    var sgs = document.getElementById('bar_sgs');
    var lJoomla = document.getElementById('letter_joomla');
    var lSgs = document.getElementById('letter_sgs');
    var sgc = document.getElementById('bar_sgc');
    var lSgc = document.getElementById('letter_sgc');
       var wordpress = document.getElementById('bar_wordpress');
    var lWordpress = document.getElementById('letter_wordpress');
    var encuesta = document.getElementById('bar_encuesta');
    var lencuesta = document.getElementById('letter_encuesta');
    
    console.log(sgs.style.background);
    if (sgs.style.background == 'rgb(238, 238, 238)') {
        var response = document.getElementById('response');
        sgs.style.background = "#0061AA";
        lSgs.style.color = "#fff";
        joomla.style.background = "#eee";
        lJoomla.style.color = "#aaa";
        sgc.style.background = "#eee";
        lSgc.style.color = "#aaa";
        wordpress.style.background = "#eee";
        lWordpress.style.color = "#aaa";
        encuesta.style.background = "#eee";
        lencuesta.style.color = "#aaa";
        conexion = crearXMLHttpRequest();
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                response.innerHTML = conexion.responseText;
            }
            else
            {
                response.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../view/bloq_sgs.php', true);
        conexion.send(null);
    }

}

function abrir_sgc() {
    var joomla = document.getElementById('bar_joom');
    var sgc = document.getElementById('bar_sgc');
    var lSgc = document.getElementById('letter_sgc');
    var sgs = document.getElementById('bar_sgs');
    var lJoomla = document.getElementById('letter_joomla');
    var lSgs = document.getElementById('letter_sgs');
     var wordpress = document.getElementById('bar_wordpress');
    var lWordpress = document.getElementById('letter_wordpress');
     var encuesta = document.getElementById('bar_encuesta');
    var lencuesta = document.getElementById('letter_encuesta');
    
    
    console.log(sgc.style.background);
    if (sgc.style.background == 'rgb(238, 238, 238)') {
        var response = document.getElementById('response');
        sgc.style.background = "#0061AA";
        lSgc.style.color = "#fff";
        joomla.style.background = "#eee";
        lJoomla.style.color = "#aaa";
        sgs.style.background = "#eee";
        lSgs.style.color = "#aaa";
        wordpress.style.background = "#eee";
        lWordpress.style.color = "#aaa";
        encuesta.style.background = "#eee";
        lencuesta.style.color = "#aaa";
        conexion = crearXMLHttpRequest();
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                response.innerHTML = conexion.responseText;
            }
            else
            {
                response.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../view/bloq_sgc.php', true);
        conexion.send(null);
    }

}


function abrir_joom() {
    var joomla = document.getElementById('bar_joom');
    var sgs = document.getElementById('bar_sgs');
    var lJoomla = document.getElementById('letter_joomla');
    var lSgs = document.getElementById('letter_sgs');
     var sgc = document.getElementById('bar_sgc');
    var lSgc = document.getElementById('letter_sgc');
        var wordpress = document.getElementById('bar_wordpress');
    var lWordpress = document.getElementById('letter_wordpress');
     var encuesta = document.getElementById('bar_encuesta');
    var lencuesta = document.getElementById('letter_encuesta');
    
    

    if (joomla.style.background == 'rgb(238, 238, 238)') {
        var response = document.getElementById('response');
        joomla.style.background = "#0061AA";
        lJoomla.style.color = "#fff";
        sgs.style.background = "#eee";
        lSgs.style.color = "#aaa";
         sgc.style.background = "#eee";
        lSgc.style.color = "#aaa";
        wordpress.style.background = "#eee";
        lWordpress.style.color = "#aaa";
        encuesta.style.background = "#eee";
        lencuesta.style.color = "#aaa";
        conexion = crearXMLHttpRequest();
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                response.innerHTML = conexion.responseText;
            }
            else
            {
                response.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../view/bloq_joomla.php', true);
        conexion.send(null);
    }

}

function analizar_sgs(){
    var usuario = document.getElementById("identificacion");
    respuesta = document.getElementById("tablas_joomla2");
    var identificacion = usuario.value;
    console.log(identificacion);
    conexion = crearXMLHttpRequest();
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = conexion.responseText;
            document.getElementById("identificacion").disabled = true;
        }


        else
        {
            respuesta.innerHTML = 'Cargando...';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
    conexion.open('GET', '../php/analizar_sgs.php?identificacion=' + identificacion, true);
    conexion.send(null);
}

function analizar_sgc(){
    var usuario = document.getElementById("identificacion");
    respuesta = document.getElementById("tablas_joomla2");
    var identificacion = usuario.value;
    console.log(identificacion);
    conexion = crearXMLHttpRequest();
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = conexion.responseText;
            document.getElementById("identificacion").disabled = true;
        }


        else
        {
            respuesta.innerHTML = 'Cargando...';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
    conexion.open('GET', '../php/analizar_sgc.php?identificacion=' + identificacion, true);
    conexion.send(null);
}



function change_user_sgs(){
    var usuario = document.getElementById("identificacion");
    var identificacion = usuario.value;
    var habilitado= document.getElementById("enabled");
    var respuesta=document.getElementById("response2");
    var contenido=respuesta.innerHTML+"<br>";
    conexion = crearXMLHttpRequest();
    if(habilitado.checked){
        var enabled=1;
    }
    else{
       var enabled=0; 
    }
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = contenido+conexion.responseText;
        }
        else
        {
            respuesta.innerHTML = 'Cargando...';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
     conexion.open('GET', '../php/change_sgs.php?identificacion=' + identificacion+'&enabled='+enabled, true);
     conexion.send(null);
}

function actualizar(){
    respuesta = document.getElementById("tablas_joomla");
    var boton = document.getElementById('bloquear');
    boton.style.backgroundImage='url("../img/bloquear_click.jpg")';
     var boton2 = document.getElementById('analizar');
      boton2.style.backgroundImage='url("../img/analizar_click.jpg")';
       var boton3 = document.getElementById('Nueva_Busqueda');
        boton3.style.backgroundImage='url("../img/Nueva_Busqueda_click.jpg")';
    console.log(boton);
    
    
    conexion = crearXMLHttpRequest();
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = conexion.responseText;
             boton2.style.backgroundImage='url("../img/analizar.jpg")';
             boton3.style.backgroundImage='url("../img/Nueva_Busqueda.jpg")';
        }


        else
        {
            respuesta.innerHTML = 'Cargando... por favor espere el proceso puede tardar algunos minutos';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
    conexion.open('GET', '../listar.php', true);
    conexion.send(null);
}

function change_user_sgc(){
    var usuario = document.getElementById("identificacion");
    var identificacion = usuario.value;
    var habilitado= document.getElementById("enabled");
    var respuesta=document.getElementById("response2");
    var contenido=respuesta.innerHTML+"<br>";
    conexion = crearXMLHttpRequest();
    if(habilitado.checked){
        var enabled=1;
    }
    else{
       var enabled=0; 
    }
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = contenido+conexion.responseText;
        }
        else
        {
            respuesta.innerHTML = 'Cargando...';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
     conexion.open('GET', '../php/change_sgc.php?identificacion=' + identificacion+'&enabled='+enabled, true);
     conexion.send(null);
}


function abrir_wordpress() {
    var joomla = document.getElementById('bar_joom');
    var sgc = document.getElementById('bar_sgc');
    var lSgc = document.getElementById('letter_sgc');
    var sgs = document.getElementById('bar_sgs');
    var lJoomla = document.getElementById('letter_joomla');
    var lSgs = document.getElementById('letter_sgs');
    var wordpress = document.getElementById('bar_wordpress');
    var lWordpress = document.getElementById('letter_wordpress');
     var encuesta = document.getElementById('bar_encuesta');
    var lencuesta = document.getElementById('letter_encuesta');
    
    
    console.log(sgc.style.background);
    if (wordpress.style.background == 'rgb(238, 238, 238)') {
        var response = document.getElementById('response');
        wordpress.style.background = "#0061AA";
        lWordpress.style.color = "#fff";
        sgc.style.background = "#eee";
        lSgc.style.color = "#aaa";
        joomla.style.background = "#eee";
        lJoomla.style.color = "#aaa";
        sgs.style.background = "#eee";
        lSgs.style.color = "#aaa";
        encuesta.style.background = "#eee";
        lencuesta.style.color = "#aaa";
        conexion = crearXMLHttpRequest();
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                response.innerHTML = conexion.responseText;
            }
            else
            {
                response.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../view/bloq_wordpress.php', true);
        conexion.send(null);
    }  
}

function consultar_word(){
    var usuario = document.getElementById("identificacion");
    var boton = document.getElementById('bloquear');
   
    var identificacion = usuario.value;
    
    var boton2 = document.getElementById('analizar');
    var separate = boton2.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    console.log(img);
    if(img!=='analizar_click.jpg)'){
         respuesta = document.getElementById("tablas_joomla");
    conexion = crearXMLHttpRequest();
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = conexion.responseText;
            document.getElementById("identificacion").disabled = true;

            if (identificacion == "") {
                boton.style.backgroundImage = 'url("../img/bloquear_click.jpg")';
            }
            else {
                boton.style.backgroundImage = 'url("../img/bloquear.jpg")';
            }

        }


        else
        {
            respuesta.innerHTML = 'Cargando...';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
    conexion.open('GET', '../php/analizar_word.php?identificacion=' + identificacion, true);
    conexion.send(null);
    }
}

function bloquear_word()
{
    var boton = document.getElementById('bloquear');
   
    var separate = boton.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    console.log(img + " " + boton.style.backgroundImage);
    if (img === 'bloquear.jpg)') {
         respuesta = document.getElementById("respuesta");
        var arreglo = new Array();
        var usuario = document.getElementById("identificacion");
        var identificacion = usuario.value;
        var contador = 0;
        var row = document.getElementsByName('paginas[]');
        conexion = crearXMLHttpRequest();
        for (var i = 0; i < row.length; i++) {
            if (row[i].checked == true) {
                arreglo[contador] = row[i].value;
                contador++;
            }
        }
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                respuesta.innerHTML = conexion.responseText;
            }
            else
            {
                respuesta.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../php/change_word.php?identificacion=' + identificacion + "&paginas=" + arreglo, true);
        conexion.send(null);
    }

}

function abrir_encuesta() {
    var joomla = document.getElementById('bar_joom');
    var sgc = document.getElementById('bar_sgc');
    var lSgc = document.getElementById('letter_sgc');
    var sgs = document.getElementById('bar_sgs');
    var lJoomla = document.getElementById('letter_joomla');
    var lSgs = document.getElementById('letter_sgs');
    var wordpress = document.getElementById('bar_wordpress');
    var lWordpress = document.getElementById('letter_wordpress');
    var encuesta = document.getElementById('bar_encuesta');
    var lencuesta = document.getElementById('letter_encuesta');
    
    
    console.log(sgc.style.background);
    if (encuesta.style.background == 'rgb(238, 238, 238)') {
        var response = document.getElementById('response');
        encuesta.style.background = "#0061AA";
        lencuesta.style.color = "#fff";
        wordpress.style.background = "#eee";
        lWordpress.style.color = "#aaa";
        sgc.style.background = "#eee";
        lSgc.style.color = "#aaa";
        joomla.style.background = "#eee";
        lJoomla.style.color = "#aaa";
        sgs.style.background = "#eee";
        lSgs.style.color = "#aaa";
       conexion = crearXMLHttpRequest();
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                response.innerHTML = conexion.responseText;
            }
            else
            {
                response.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../view/pasar_encuesta.php', true);
        conexion.send(null);
    }  
}

function consultar_encuesta(){
    var usuario = document.getElementById("identificacion");
    var boton = document.getElementById('bloquear_encuesta');
   
    var identificacion = usuario.value;
    
    var boton2 = document.getElementById('analizar_encuesta');
    var separate = boton2.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    console.log(img);
    if(img!=='analizar_encuesta_click.png)'){
         respuesta = document.getElementById("tablas_joomla");
    conexion = crearXMLHttpRequest();
    conexion.onreadystatechange = function() {
        if (conexion.readyState == 4)
        {
            respuesta.innerHTML = conexion.responseText;
            document.getElementById("identificacion").disabled = true;

            if (identificacion == "") {
                boton.style.backgroundImage = 'url("../img/trasladar_click.png")';
            }
            else {
                boton.style.backgroundImage = 'url("../img/trasladar.png")';
            }

        }


        else
        {
            respuesta.innerHTML = 'Cargando...';
            // respuesta.innetHTML = conexion.responseText;
        }
    };
    conexion.open('GET', '../php/analizar_encuesta.php?identificacion=' + identificacion, true);
    conexion.send(null);
    }
}

function nuevaBusquedaEncuesta() {
    var boton2 = document.getElementById('Nueva_Busqueda');
     var separate = boton2.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    if(img!=='Nueva_Busqueda_click.jpg)'){
    var boton = document.getElementById('bloquear_encuesta');
    boton.style.backgroundImage = 'url("../img/trasladar_click.png")';
    respuesta = document.getElementById("respuesta");
    respuesta.innerHTML = "";
    respuesta = document.getElementById("tablas_joomla");
    respuesta.innerHTML = "";
    usuario = document.getElementById("identificacion");
    usuario.value = "";
    document.getElementById("identificacion").disabled = false;
    }
}

function bloquear_encuesta()
{
    var boton = document.getElementById('bloquear_encuesta');
   
    var separate = boton.style.backgroundImage.split("/");
    var img = separate[separate.length - 1];
    console.log(img + " " + boton.style.backgroundImage);
    if (img === 'trasladar.png)') {
         respuesta = document.getElementById("respuesta");
        var arreglo = new Array();
        var usuario = document.getElementById("identificacion");
        var identificacion = usuario.value;
        var contador = 0;
        var row = document.getElementsByName('paginas[]');
        conexion = crearXMLHttpRequest();
        for (var i = 0; i < row.length; i++) {
            if (row[i].checked == true) {
                arreglo[contador] = row[i].value;
                contador++;
            }
        }
        conexion.onreadystatechange = function() {
            if (conexion.readyState == 4)
            {
                respuesta.innerHTML = conexion.responseText;
            }
            else
            {
                respuesta.innerHTML = 'Cargando...';
                // respuesta.innetHTML = conexion.responseText;
            }
        };
        conexion.open('GET', '../php/change_encuesta.php?identificacion=' + identificacion + "&paginas=" + arreglo, true);
        conexion.send(null);
    }

}