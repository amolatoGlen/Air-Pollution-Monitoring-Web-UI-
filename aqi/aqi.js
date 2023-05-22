/*=============== RANGE SLIDER JS ===============*/
const rangeThumb = document.getElementById('range-thumb'),
      rangeNumber = document.getElementById('range-number'),
      rangeLine = document.getElementById('range-line'),
      rangeInput = document.getElementById('range-input')

const rangeInputSlider = () =>{

   // Insert the value of the input range
   rangeNumber.textContent = rangeInput.value
   

   // Calculate the position of the input thumb
   // rangeInput.value = 50, rangeInput.max = 100, (50 / 100 = 0.5)
   // rangeInput.offsetWidth = 248, rangeThumb.offsetWidth = 32, (248 - 32 = 216)
   const thumbPosition = (rangeInput.value / rangeInput.max),
         space = rangeInput.offsetWidth - rangeThumb.offsetWidth

   // We insert the position of the input thumb
   // thumbPosition = 0.5, space = 216 (0.5 * 216 = 108)
   rangeThumb.style.left = (thumbPosition * space) + 'px'

   // We insert the width to the slider with the value of the input value
   // rangeInput.value = 50, ancho = 50%
   //rangeLine = rangeInput.value + '%'

   // We call the range input
   //rangeInput.addEventListener('input', rangeInputSlider)
}

rangeInputSlider()
console.log(rangeInput.value)
const aqiValue = (rangeInput.value)
const aqiTextElement = document.getElementById("aqi-text");

// Change the text of the HTML element based on the AQI value
if (aqiValue >= 0 && aqiValue <= 50) {
  aqiTextElement.textContent = "The air quality is good. ";
} else if (aqiValue > 50 && aqiValue <= 100) {
  aqiTextElement.textContent = "The air quality is moderate. Unusually sensitive individuals should consider limiting prolonged exertion especially near busy roads.";
} else if (aqiValue > 100 && aqiValue <= 150) {
  aqiTextElement.textContent = "The air quality is unhealthy for sensitive groups. People with asthma, children and older adults should limit prolonged exertion especially near busy roads.";
} else if (aqiValue > 150 && aqiValue <= 200) {
  aqiTextElement.textContent = "The air quality is unhealthy. People with asthma, children and older adults should avoid prolonged exertion near roadways; everyone else should limit prolonged exertion especially near busy roads.";
} else if (aqiValue > 200 && aqiValue <= 300) {
  aqiTextElement.textContent = "The air quality is very unhealthy. People with asthma, children and older adults should avoid all outdoor exertion; everyone else should avoid prolonged exertion especially near busy roads.";
} else if (aqiValue > 300) {
  aqiTextElement.textContent = "The air quality is hazardous. People with asthma, children and older adults should remain indoors; everyone else should avoid all outdoor exertion.";
}