document.addEventListener("DOMContentLoaded", function () {
    const questions = document.querySelectorAll(".quiz-question");
    let currentIndex = 0;
    let userSelections = {};
    const quizForm = document.getElementById("bb-quiz-form");
    const resultContainer = document.getElementById("bb-quiz-results");
    const showResultsButton = document.querySelector(".show-results");

    function scrollToNext() {
        currentIndex++;
        if (currentIndex < questions.length) {
            questions[currentIndex].scrollIntoView({ behavior: "smooth" });
        } else {
            showResultsButton.style.display = "block";
            showResultsButton.scrollIntoView({ behavior: "smooth" });
        }
    }

    function selectQuizOption(button, question, value) {
        document.querySelectorAll(`[data-name="${question}"]`).forEach(btn => btn.classList.remove("selected"));
        button.classList.add("selected");
        document.querySelector(`input[name="${question}"]`).value = value;
        userSelections[question] = value;
        console.log(`Selected: ${question} = ${value}`);
        let allAnswered = Object.keys(userSelections).length === questions.length;
        if (allAnswered) {
            showResultsButton.style.display = "block";
            showResultsButton.scrollIntoView({ behavior: "smooth" });
        } else {
            scrollToNext();
        }
    }

    function filterRestaurants() {
        console.log("Filtering restaurants based on selections...", userSelections);
        let bestMatch = null;
        
        for (let matchThreshold = 7; matchThreshold >= 2; matchThreshold--) {
            let filtered = bb_restaurants.filter(restaurant => {
                let matches = 0;

                if (userSelections.open_tonight === "yes") {
                    let now = new Date();
                    let today = ["sunday", "monday", "tuesday", "wednesday", "thursday", "friday", "saturday"][now.getDay()];
                    let open = restaurant[`${today}_open`];
                    let close = restaurant[`${today}_close`];

                    if (open && close) {
                        let openTime = new Date(`1970-01-01T${open}`);
                        let closeTime = new Date(`1970-01-01T${close}`);
                        if (now >= openTime && now <= closeTime) matches++;
                    }
                }

                if (userSelections.happy_hour === "yes" && restaurant.happy_hour == 1) matches++;
                if (userSelections.indoor_outdoor && restaurant.outdoor_seating_area !== null) {
                    if (userSelections.indoor_outdoor === "outdoor" && restaurant.outdoor_seating_area == 1) matches++;
                    if (userSelections.indoor_outdoor === "indoor" && restaurant.outdoor_seating_area == 0) matches++;
                }
                if (userSelections.vibe && restaurant.lowkey_vs_poppin === userSelections.vibe) matches++;
                if (userSelections.movement && restaurant.sit_relax_vs_up_moving === userSelections.movement) matches++;
                if (userSelections.budget && restaurant.price === userSelections.budget) matches++;
                if (userSelections.adults_only && restaurant.adults_only == (userSelections.adults_only === "yes" ? 1 : 0)) matches++;
                if (userSelections.bring_parents && restaurant.bring_parents_here == (userSelections.bring_parents === "yes" ? 1 : 0)) matches++;

                return matches >= matchThreshold;
            });

            if (filtered.length > 0) {
                bestMatch = filtered[Math.floor(Math.random() * filtered.length)];
                break;
            }
        }

        if (bestMatch) {
            showResultsOnPage(bestMatch);
        } else {
            alert("No matches found. Try adjusting your preferences!");
        }
		if (bestMatch) {
			bestMatch.slug = bestMatch.slug || bestMatch.name.toLowerCase().replace(/\s+/g, '-').replace(/[^a-z0-9-]/g, '');
			showResultsOnPage(bestMatch);
		}

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
    function showResultsOnPage(restaurant) {
		let borderColor = "#000";
		if (restaurant.approved_by === "Kiley") borderColor = "#FFC700";
		if (restaurant.approved_by === "Maya") borderColor = "#c02bff";
		if (restaurant.approved_by === "Sophia") borderColor = "#442bff";

        quizForm.style.display = "none";
        resultContainer.style.display = "block";
        resultContainer.innerHTML = `
            <div class="result-container">
                <h1>The results are in...</h1>
                <h2>And your perfect spot is <strong>${restaurant.name}</strong>! Go check it out and let the fun begin!</h2>
                <a href="https://thebellinghambuzz.com/locations2/${restaurant.slug}" class="top-match-card-link">

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

    document.querySelectorAll(".quiz-option").forEach(button => {
        button.addEventListener("click", function () {
            selectQuizOption(this, this.dataset.name, this.dataset.value);
        });
    });

    document.getElementById("bb-quiz-form").addEventListener("submit", function (e) {
        e.preventDefault();
        filterRestaurants();
    });

    window.addEventListener("load", function () {
        quizForm.style.display = "block";
        resultContainer.style.display = "none";
        showResultsButton.style.display = "none";
    });
});


