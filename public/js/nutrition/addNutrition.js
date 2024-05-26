const btnAdd = document.getElementById('addNutrition');
btnAdd.addEventListener('click', async () => {
    const data = {
        trainer_id: document.getElementById('trainer_id').value,
        athlete_id: document.getElementById('athlete_id').value,
        day_type: document.getElementById('day_type').value,
        carbohydrates: document.getElementById('carbohydrates').value,
        proteins: document.getElementById('proteins').value,
        fats: document.getElementById('fats').value,
        calories: document.getElementById('calories').value
    }

    const options = {
        method: "POST",
        headers: {"Content-Type": "application/json"},
        body: JSON.stringify(data)
    }

    // Clear form fields
    document.getElementById('day_type').value = '';
    document.getElementById('carbohydrates').value = '';
    document.getElementById('proteins').value = '';
    document.getElementById('fats').value = '';
    document.getElementById('calories').value = '';

    try {
        const response = await fetch('http://localhost:8000/api/addNutrition', options);

        if (!response.ok) {
          throw new Error(`Error: ${response.statusText}`);
        }

        const data = await response.json();
        console.log('Nutrition data successfully inserted:', data);
        window.location.reload();


      } catch (error) {
        console.error('Error inserting nutrition data:', error);
    }
});
