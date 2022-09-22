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
  const searchQuery = document.querySelector("#from_city").value;
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
  const searchQuery = document.querySelector("#to_city").value;
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
  const userChoiceText = event.target.querySelector(".from_city_country").innerText;
  document.querySelector("#from_city").value = userChoiceText;
  document.querySelector("#from_result").style.display = "none";
}
function selectCityTo() {
  const userChoiceText = event.target.querySelector(".to_city_country").innerText;
  document.querySelector("#to_city").value = userChoiceText;
  document.querySelector("#to_result").style.display = "none";
}

function rotate() {
  const switchSVG = document.querySelector("#switch_city svg");
  const from_input = document.querySelector("#from_city");
  const to_input = document.querySelector("#to_city");

  if (to_input.value === "") {
    switchSVG.classList.toggle("flip");
    switchSVG.classList.remove("flipBack");
    to_input.value = document.querySelector("#from_city").value;
    from_input.value = null;
  } else if (from_input.value === "") {
    switchSVG.classList.toggle("flipBack");
    switchSVG.classList.remove("flip");
    from_input.value = to_input.value;
    to_input.value = null;
  } else if (from_input.value.length && to_input.value.length > 0) {
    switchSVG.classList.toggle("flipBack");
    let temp = to_input.value;
    to_input.value = from_input.value;
    from_input.value = temp;
  }
}

// function displayNone() {
//   const fromSVG = document.querySelector("#from_icon svg");
//   if (!from_input.value === "") {
//     fromSVG.classList.add(".display_none");
//   }
// }
function displayLogin() {
  document.querySelector("#login_container").style.display = "flex";
  document.querySelector("#overlay").style.display = "block";
}
function closeLogin() {
  document.querySelector("#login_container").style.display = "none";
  document.querySelector("#overlay").style.display = "none";
  document.querySelector("#form_sign_in").style.display = "flex";
  document.querySelector("#form_sign_up").style.display = "none";
}

async function signup() {
  const formSignup = document.querySelector("#form_sign_up");
  let conn = await fetch("/api_signup.php", {
    method: "POST",
    body: new FormData(formSignup),
  });
  if (!conn.ok) {
    console.log("Bad connection");
    Swal.fire("Hhmm something went wrong");
    return;
  }
  const data = await conn.json();
  console.log(data);
  Swal.fire("Good job " + data.user_first_name + ' ' + data.user_last_name, "You have signed up succesfully");
  closeLogin();
  
}

async function signin() {
  const formLogin = document.querySelector("#form_sign_in");
  const response = await fetch("/api_signin.php", {
    method: "POST",
    body: new FormData(formLogin),
  });
  if (!response.ok) {
    console.log("Wrong login");
    return;
  }
  const data = await response.json();
  const user = JSON.parse(data.info)
  console.log(user)
  document.querySelector('#welcome_message').innerHTML = 'welcome ' + user.user_name
  closeLogin()
}

function displaySignup() {
  document.querySelector("#form_sign_in").style.display = "none";
  document.querySelector("#form_sign_up").style.display = "flex";
}
