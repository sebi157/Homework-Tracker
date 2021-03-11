function toggle(){

    if(document.getElementById("calendar").style.display = 'inline') {

        document.getElementById("attid").style.display = 'none';
    }
    else
    {
        document.getElementById("attid").style.display = 'inline';
    }
}
const date = new Date();
const monthDays = document.querySelector('.days');
const lastDay = new Date(date.getFullYear(),date.getMonth()+1,0).getDate();
date.setMonth(2);
const months=[
    "January",
    "February",
    "March",
    "April",
    "May",
    "June",
    "July",
    "August",
    "September",
    "October",
    "November",
    "December",
]
document.querySelector(".date>h1").innerHTML=months[date.getMonth()];
let days = "";
for(let i=1;i<=lastDay;i++)
{
    days += `<div>${i}</div>`;
    monthDays.innerHTML = days;
}