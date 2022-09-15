let from_input = document.querySelector("#from_city");
let to_input = document.querySelector("#to_city");

function showResultFrom() {
  const userInputFrom = document.querySelector("#from_city");
  const resultFrom = document.querySelector("#from_result");

  if (userInputFrom.value.length > 0) {
    resultFrom.style.display = "block";
    getCitiesFrom();
  } else {
    resultFrom.style.display = "none";
  }
}

function showResultTo() {
  const userInputTo = document.querySelector("#to_city");
  const resultTo = document.querySelector("#to_result");

  if (userInputTo.value.length > 0) {
    resultTo.style.display = "block";
    getCitiesTo();
  } else {
    resultTo.style.display = "none";
  }
}

function hideResults() {
  document.querySelector("#from_result").style.display = "none";
  document.querySelector("#to_result").style.display = "none";
}

async function getCitiesFrom() {
  //sletter alt i div #from_result
  document.querySelector("#from_result").textContent = null;
  const searchQuery = from_input.value;
  let conn = await fetch("api_get_city_from.php?from_city=" + searchQuery);
  let unsortedData = await conn.json();
  let sortedData = unsortedData.sort((a) => {
    const aSubstr = a.city_name.substring(0, searchQuery.length);
    if (aSubstr.toLowerCase() === searchQuery.toLowerCase()) return -1;
    else return 0;
  });
  let data = sortedData.slice(0, 5);
  let flightBlueprint = `<div class="from_city" onclick="selectCityFrom()">
                              <img src="img/img_city.png">
                              <div>
                              <h4 class="from_city_country">#from_city#, #from_country#</h4>
                              <p class="airport">#airport#</p>
                              </div>
                              <p class="abr">#abr#</p>
                          </div>`;
  let allCities = "";

  data.forEach((city) => {
    let divFlight = flightBlueprint;
    divFlight = divFlight.replace("img_city.png", city.city_image);
    divFlight = divFlight.replace("#from_city#", city.city_name);
    divFlight = divFlight.replace("#from_country#", city.city_country);
    divFlight = divFlight.replace("#airport#", city.city_airport);
    divFlight = divFlight.replace("#abr#", city.city_airport_abr);
    allCities += divFlight;
  });
  document.querySelector("#from_result").insertAdjacentHTML("afterbegin", allCities);
}

//////////////////////////////////////////////////

async function getCitiesTo() {
  //sletter alt i div #to_result
  document.querySelector("#to_result").textContent = null;
  const searchQuery = to_input.value;
  let conn = await fetch("api_get_city_to.php?to_city=" + searchQuery);
  let unsortedData = await conn.json();
  let sortedData = unsortedData.sort((a) => {
    const aSubstr = a.city_name.substring(0, searchQuery.length);
    if (aSubstr.toLowerCase() === searchQuery.toLowerCase()) return -1;
    else return 0;
  });
  let data = sortedData.slice(0, 5);
  let flightBlueprint = `<div class="to_city" onclick="selectCityTo()">
                              <img src="img/img_city.png">
                              <div>
                              <h4 class="to_city_country">#to_city#, #to_country#</h4>
                              <p class="airport">#airport#</p>
                              </div>
                              <p class="abr">#abr#</p>
                          </div>`;
  let allCities = "";

  data.forEach((city) => {
    let divFlight = flightBlueprint;
    divFlight = divFlight.replace("img_city.png", city.city_image);
    divFlight = divFlight.replace("#to_city#", city.city_name);
    divFlight = divFlight.replace("#to_country#", city.city_country);
    divFlight = divFlight.replace("#airport#", city.city_airport);
    divFlight = divFlight.replace("#abr#", city.city_airport_abr);
    allCities += divFlight;
  });

  document.querySelector("#to_result").insertAdjacentHTML("afterbegin", allCities);
}

function selectCityFrom() {
  console.log(event.target.querySelector(".from_city_country").innerText);
  const userChoiceText = event.target.querySelector(".from_city_country").innerText;
  document.querySelector("#from_city").value = userChoiceText;
  document.querySelector("#from_result").style.display = "none";
}
function selectCityTo() {
  console.log(event.target.querySelector(".to_city_country").innerText);
  const userChoiceText = event.target.querySelector(".to_city_country").innerText;
  document.querySelector("#to_city").value = userChoiceText;
  document.querySelector("#to_result").style.display = "none";
}
