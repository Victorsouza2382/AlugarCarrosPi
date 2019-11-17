
function requisitarPagina(url) {

    document.getElementById('conteudo').innerHTML = ''
    
    //incluir o gif de loading na página
    if(!document.getElementById('loading')) {
        let imgLoading = document.createElement('img')
        imgLoading.id = 'loading'
        imgLoading.src = 'img/loading.gif'
        imgLoading.className = 'rounded mx-auto d-block'

        document.getElementById('conteudo').appendChild(imgLoading)
    }

    let ajax = new XMLHttpRequest();

    //requisição não iniciada, state = 0
    //console.log(ajax.readyState)

    ajax.open('GET', url)

    //conexão estabelecida com o servidor, state = 1
    //console.log(ajax.readyState)
    

    //de alguma lógica que fique olhando para o progresso da req
    ajax.onreadystatechange = () => {
        if(ajax.readyState == 4 && ajax.status == 200) {

            document.getElementById('conteudo').innerHTML = ajax.responseText
            //document.getElementById('loading').remove()
        }

        if(ajax.readyState == 4 && ajax.status == 404) {

            document.getElementById('conteudo').innerHTML = ajax.responseText
            //document.getElementById('loading').remove()
        }
    }

    ajax.send()
    //console.log(ajax)
}

