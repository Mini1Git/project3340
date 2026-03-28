async function fetchRestaurant(){

    //sincec getting data, only need to use GET.
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onload = function () { // top 10 limit. TO DO ///////////////////////////////
        const jsonData = JSON.parse(this.response);
        const restaurantBox = document.querySelector(".restaurant");
        const restaurantList = document.createElement("ul");

        let limit = 12;
        let count = 0;
        jsonData.forEach(restaurant => {
            count++;
            if (count <= limit) {
                console.log(count);
                const listitem = document.createElement("li");
                const anchor = document.createElement("a");
                anchor.href = `../services/menu.php?id=${restaurant["restaurant_id"]}`; //adding it temporariliy like this

                const image = document.createElement("img");
                image.src = `../${restaurant["image_path"]}`;
                image.alt = restaurant["business_name"];
                anchor.appendChild(image);

                const info = document.createElement("div");
                info.className = "info";
                const icon = document.createElement("i");
                icon.classList.add("fa-solid", "fa-star");
                info.appendChild(icon);

                const rateCuisne = document.createElement("span");
                rateCuisne.textContent = restaurant["rating"] + " | " + restaurant["cuisine_name"];
                info.appendChild(rateCuisne);

                const address = document.createElement("address");
                address.textContent = restaurant["address"];

                info.appendChild(address);

                const name = document.createElement("h3");
                name.textContent = restaurant["business_name"];

                info.appendChild(name);

                anchor.appendChild(info);
                listitem.appendChild(anchor);
                restaurantList.appendChild(listitem);

            }
        });
        restaurantBox.appendChild(restaurantList); //append at end.
    }
    xmlhttp.open("GET", "../server/frontPageRestaurantBackend.php");
    xmlhttp.send();


}

window.onload = ()=> fetchRestaurant();
