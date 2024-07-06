var count = 0;
document.getElementById("myButton").onclick = function () {
    count++;
    if (count % 2 == 0) {
        document.getElementById("demo").innerHTML = "";
    } else {
        var img = document.createElement("img");
        img.src =
            "https://sun9-37.userapi.com/impf/brslzTVDam5n1NIsQ8OoQx-Icmb3LfojtT4VZg/0WzkleMiIFM.jpg?size=1818x606&quality=95&crop=0,0,2386,795&sign=aa7a31ff665f18ed4a641ba7965624ea&type=cover_group";
        document.getElementById("demo").appendChild(img);
    }
};
