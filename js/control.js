function ajustar()
{
    //Identifica navegador
    var TamanhoTopo;
    TamanhoTopo = 113;

    if (navigator.appName.indexOf("Microsoft") != -1)
    {
      document.getElementById('frameSlide').height = document.documentElement.clientHeight - TamanhoTopo;
    }
    else
    {
      document.getElementById('frameSlide').height = window.innerHeight - TamanhoTopo;
    }
  }

