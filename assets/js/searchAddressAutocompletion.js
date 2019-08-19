import Places from 'places.js'

let searchAdress = document.querySelector('#prospect_fullAddress');
if (searchAdress !== null) {
    let place = Places({
        container: searchAdress
    });
    place.on('change', e => {
        document.querySelector('#prospect_city').value = e.suggestion.city;
        document.querySelector('#prospect_zipCode').value = e.suggestion.postcode;
        document.querySelector('#prospect_street').value = e.suggestion.name;
    })
}
