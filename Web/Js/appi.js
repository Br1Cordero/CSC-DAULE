const d = document;
$main = d.querySelector('#main');

const getHTML = options => {
    let {url, success, error} = options;
    const xhr = new XMLHttpRequest();

    xhr.addEventListener("readystatechange", e=>{
        if (xhr.readyState !==4) return;

        if(xhr.status === 200 && xhr.status < 300) {
            let html = xhr.responseText;
            success(html);
        }else{
            let message = xhr.statusText || "Ocurrio un error";
            error("Error:  "+ xhr.status+": "+ message);
        }
    });

    xhr.open("GET", url);
    xhr.setRequestHeader("Content-Type", "text/html; charset=UTF-8");
    xhr.send();
}
 

    d.addEventListener("click", e=>{
        if(e.target.matches(".nav__inferior ul li a")){
            e.preventDefault();
            getHTML({
                url: e.target.href,
                success:(html) => $main.innerHTML= html,
                error:(err)=> $main.innerHTML= '<h1>${err}</h1>'
            });
        }

        if(e.target.matches(".nav__li-container li a")){
            e.preventDefault();
            getHTML({
                url: e.target.href,
                success:(html) => $main.innerHTML= html,
                error:(err)=> $main.innerHTML= '<h1>${err}</h1>'
            });
        }
    });

    /*
       d.addEventListener("DOMContentLoaded", e=>{
        getHTML({
            url: "HTML/index.html",
            success:(html) => $main.innerHTML= html,
            error:(err)=> $main.innerHTML= '<h1>'+err+'</h1>'
        });
    });
    
    */ 