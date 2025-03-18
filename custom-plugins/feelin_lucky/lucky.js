document.addEventListener("DOMContentLoaded", function () {
    const resultContainer = document.getElementById("lucky-results");
    const rerollButton = document.getElementById("lucky-reroll");
function slugify(text) {
    return text
        .toString()
        .normalize("NFD") // Normalize special characters
        .replace(/[\u0300-\u036f]/g, "") // Remove diacritics
        .toLowerCase()
        .trim()
        .replace(/[^a-z0-9-]/g, '-') // Replace special characters with hyphens
        .replace(/-+/g, '-'); // Remove duplicate hyphens
}

    function getRandomRestaurant() {
        if (!lucky_restaurants || lucky_restaurants.length === 0) {
            resultContainer.innerHTML = "<p>No restaurants found.</p>";
            return;
        }

        let randomIndex = Math.floor(Math.random() * lucky_restaurants.length);
        let restaurant = lucky_restaurants[randomIndex];

        displayRestaurant(restaurant);
    }
function formatPrice(price) {
    if (price === "cheap") {
        return '<span class="white-dollar">$</span><span class="gray-dollar">$</span><span class="gray-dollar">$</span><span class="gray-dollar">$</span>';
    } else if (price === "expensive") {
        return '<span class="white-dollar">$</span><span class="white-dollar">$</span><span class="white-dollar">$</span><span class="gray-dollar">$</span>';
    } else {
        return price;
    }
}

    function displayRestaurant(restaurant) {
		        let borderColor = "#000";
        if (restaurant.approved_by === "Kiley") borderColor = "#FFC700";
        if (restaurant.approved_by === "Maya") borderColor = "#c02bff";
        if (restaurant.approved_by === "Sophia") borderColor = "#442bff";


        resultContainer.innerHTML = `
            <div class="result-container">
                <h1>The results are in...</h1>
                <h2>And your perfect spot is <strong>${restaurant.name}</strong>! Go check it out and let the fun begin!</h2>
               <a href="${restaurant.post_url ? restaurant.post_url : `https://thebellinghambuzz.com/locations2/${slugify(restaurant.name)}`}" class="top-match-card-link">


                    <div class="top-match-card">
                        <img src="${restaurant.image_url ? restaurant.image_url : 'https://via.placeholder.com/300'}" alt="${restaurant.name}" class="top-match-image">
                        <div class="info-container">
                            <h3>${restaurant.name}</h3>
                            <div class="tag-container">
								<span class="tag type">${restaurant.type}</span>
${restaurant.approved_by ? `<span class="tag loc-approved" style="border-color: ${borderColor};">${restaurant.approved_by}'s Pick</span>` : ''}
<span class="tag budget">${formatPrice(restaurant.price)}</span>

								${restaurant.adults_only == 1 ? '<span class="tag age-restricted">21+</span>' : '<span class="tag age-restricted">All Ages</span>'}

                                <span class="tag vibe">${restaurant.lowkey_vs_poppin}</span>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        `;
    }

    getRandomRestaurant();

    rerollButton.addEventListener("click", function () {
        getRandomRestaurant();
    });
});
