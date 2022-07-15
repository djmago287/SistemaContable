<!-- las graficas de todo el contenido-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script> 
<article class="boxgrafica">
    <section class="grafica" >
        <canvas id="grafica1" width="5px" height="5px"></canvas>
    </section>
    <section class="grafica"
    
    >
        <canvas id="grafica2" width="5px" height="5px"></canvas>
    </section>
  
</article>
<script>
  const ctx = document.getElementById('grafica1').getContext('2d');
  //obtener todos los nombre de sub tipo
  var txt_nameSubtipo = document.getElementsByClassName('txt_nameSubtipo');
  var txt_totalSubtipo = document.getElementsByClassName('txt_totalSubtipo'); 
  var boxtipo = document.getElementsByClassName('boxtipo');
  var boxsubtipo = document.getElementsByClassName('box_Subtipo');
  console.log(boxsubtipo);
  console.log(boxtipo[1].innerText)
  var array_tipo = [];
  
  //esperamos un segundo hasta que todo carge
  setTimeout(()=>{
    var i=0;
    while (i < txt_nameSubtipo.length) {  
        array_tipo = {
            "nameSubtipo":txt_nameSubtipo[i].innerText,
            ""

        }
        array_nameSubtipo.push(txt_nameSubtipo[i].innerText);
        array_totalesSubtipo.push(txt_totalSubtipo[i].innerText);
        i++;
    }
    
    console.log(array_totalesSubtipo);
    const data = {
    labels: array_nameSubtipo,
    datasets: [{
        label: 'Ingresos',
        data: array_totalesSubtipo,
        backgroundColor: [
        'rgb(255, 99, 132)',
        'rgb(54, 162, 235)',
        'rgb(255, 205, 86)',
        'rgb(255, 205, 8)',
        'rgb(255, 20, 10)',
        'rgb(255, 105, 86)',   
        ],
        hoverOffset: 4
    }]
    };
    const myChart = new Chart(ctx, {
       
        type: 'pie',
        data: data,
        options:{
            title:{
                display:true,
                text:'Ingresos',
            }
        }
       
    });
    const ctx2 = document.getElementById('grafica2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'pie',
        data: data,
        options:{
            title:{
                display:true,
                text:boxtipo[1].innerText,
            }
        }
    });
  },1000);

 
  
</script>