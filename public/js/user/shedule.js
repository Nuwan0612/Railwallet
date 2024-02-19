// const wrapper = document.querySelector(".wrapper");
// const wrapper2 = document.querySelector(".wrapper2");
// selectBtn = wrapper.querySelector(".select-btn");
// selectBtn2 = wrapper2.querySelector(".select-btn2");
// searchInp = wrapper.querySelector("input");
// searchInp2 = wrapper2.querySelector("input");
// options = wrapper.querySelector(".options");
// options2= wrapper2.querySelector(".options2");


// //array of some stations

// let stations=["Hikkaduwa","Matara","Ambalangoda","Galle","Hikkaduwa","Matara","Ambalangoda","Galle"];

// function addStations(selectedStation){
//     options.innerHTML="";
//     stations.forEach(station=>{
//         //if selected station and station value is same then add
//         let isSelected=station==selectedStation ? "selected":"";
//         //adding each stations inside li and inserting ali li inside options tag
//         let li=`<li onClick="updateName(this)" class="${isSelected}">${station}</li>`;
//         options.insertAdjacentHTML("beforeend",li);
//         options2.insertAdjacentHTML("beforeend",li);
//     });
// }
// addStations();

// function addStations2(selectedStation){
//     options2.innerHTML="";
//     stations.forEach(station=>{
//         //if selected station and station value is same then add
//         let isSelected2=station==selectedStation ? "selected":"";
//         //adding each stations inside li and inserting ali li inside options tag
//         let li2=`<li onClick="updateName2(this)" class="${isSelected2}">${station}</li>`;
//         options2.insertAdjacentHTML("beforeend",li2);
//     });
// }
// addStations2();

// function updateName(selectedLi){
//     searchInp.value="";
//     addStations(selectedLi.innerText);
//     wrapper.classList.remove("active");
//     selectBtn.firstElementChild.innerText=selectedLi.innerText;
// };
// function updateName2(selectedLi){
//     searchInp2.value="";
//     addStations(selectedLi.innerText);
//     wrapper2.classList.remove("active");
//     selectBtn2.firstElementChild.innerText=selectedLi.innerText;
// };
// searchInp.addEventListener("keyup",()=>{
//     let arr=[];//creating empty array
//     let searchedVal=searchInp.value.toLowerCase();
//     //returning all stations from array which are start with user searched value
//     //and mapping returned country with li and joining them

//     arr=stations.filter(data=>{
//         return data.toLowerCase().startsWith(searchedVal);
//     }).map(data=>`<li onClick="updateName(this)">${data}</li>`).join("");
//     options.innerHTML=arr? arr:`<p>Oops! stations not found</p>`;
// })

// searchInp2.addEventListener("keyup",()=>{
//     let arr2=[];//creating empty array
//     let searchedVal2=searchInp2.value.toLowerCase();
//     //returning all stations from array which are start with user searched value
//     //and mapping returned country with li and joining them

//     arr2=stations.filter(data=>{
//         return data.toLowerCase().startsWith(searchedVal2);
//     }).map(data=>`<li onClick="updateName2(this)">${data}</li>`).join("");
//     options2.innerHTML=arr? arr:`<p>Oops! stations not found</p>`;
// })

// selectBtn.addEventListener("click", () => {
//     wrapper.classList.toggle("active");

// });

// selectBtn2.addEventListener("click", () => {
//     wrapper2.classList.toggle("active");

// });

const wrapper = document.querySelector(".wrapperBooking");
selectBtn = wrapper.querySelector(".select-btn");
searchInp = wrapper.querySelector("input");
options = wrapper.querySelector(".options");


//array of some stations

let stations=["Hikkaduwa","Matara","Ambalangoda","Galle","Hikkaduwa","Matara","Ambalangoda","Galle"];

function addStations(selectedStation){
    options.innerHTML="";
    stations.forEach(station=>{
        //if selected station and station value is same then add
        let isSelected=station==selectedStation ? "selected":"";
        //adding each stations inside li and inserting ali li inside options tag
        let li=`<li onClick="updateName(this)" class="${isSelected}">${station}</li>`;
        options.insertAdjacentHTML("beforeend",li);
    });
}
addStations();

function updateName(selectedLi){
    searchInp.value="";
    addStations(selectedLi.innerText);
    wrapper.classList.remove("active");
    selectBtn.firstElementChild.innerText=selectedLi.innerText
};

searchInp.addEventListener("keyup",()=>{
    let arr=[];//creating empty array
    let searchedVal=searchInp.value.toLowerCase();
    //returning all stations from array which are start with user searched value
    //and mapping returned country with li and joining them

    arr=stations.filter(data=>{
        return data.toLowerCase().startsWith(searchedVal);
    }).map(data=>`<li onClick="updateName(this)">${data}</li>`).join("");
    options.innerHTML=arr? arr:`<p>Oops! stations not found</p>`;
})

selectBtn.addEventListener("click", () => {
    wrapper.classList.toggle("active");
});












