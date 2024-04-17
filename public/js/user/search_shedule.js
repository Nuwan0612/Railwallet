let availableKeywords =[
    'Hikkaduwa',
    'Ambalangoda',
    'Galle',
    'Pettah',
    'Mount Lavinia',
    'Kaluthera',
    'Hikkaduwa',
    'Ambalangoda',
    'Galle',
    'Pettah',
    'Mount Lavinia',
    'Kaluthera',
];

const resultsBox= document.querySelector('.result-box1');
const inputBox=document.getElementById("search-departure-station");

inputBox.onkeyup=function () {
    let result=[];
    let input=inputBox.value;
    if(input.length){
        result=availableKeywords.filter((keyword)=>{
           return keyword.toLowerCase().includes(input.toLowerCase())
        });
        console.log(result);
    }
    display1(result);
    if(!result.length){
        // resultsBox.innerHTML='No Suggestion'
        resultsBox.innerHTML='';
    }
}

function display1(result){
    const content=result.map((list)=>{
        return "<li onclick=selectInput(this)>" + list + "</li>";
    });

    resultsBox.innerHTML="<ul>"+content.join('')+"</ul>";
}

function selectInput(list){
    inputBox.value=list.innerHTML;
    resultsBox.innerHTML='';
}

//## Arrival Station Searching ##//

const resultsBox2=document.querySelector('.result-box2');
const inputBox2=document.getElementById("search-arrival-station");

inputBox2.onkeyup=function () {
    let result=[];
    let input=inputBox2.value;
    if(input.length){
        result=availableKeywords.filter((keyword)=>{
           return keyword.toLowerCase().includes(input.toLowerCase())
        });
        console.log(result);
    }
    display2(result);
    if(!result.length){
        // resultsBox.innerHTML='No Suggestion'
        resultsBox2.innerHTML='';
    }
}

function display2(result){
    const content=result.map((list)=>{
        return "<li onclick=selectInput2(this)>" + list + "</li>";
    });

    resultsBox2.innerHTML="<ul>"+content.join('')+"</ul>";
}

function selectInput2(list){
    inputBox2.value=list.innerHTML;
    resultsBox2.innerHTML='';
}
