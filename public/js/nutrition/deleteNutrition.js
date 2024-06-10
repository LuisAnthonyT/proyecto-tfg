const deleteNutrition = document.getElementById('deleteNutrition');
deleteNutrition.addEventListener('click', async () => {
    const idNutrition = document.getElementById('nutritionId').value;
    const options = {
        method: 'DELETE',
        headers: {"Content-Type": "application/json"},
    }
    const url = `http://localhost:8000/api/deleteNutrition/${idNutrition}`;

    try {
        const response = await fetch(url, options);

        if  (!response.ok) {
            throw new Error(`Error: ${response.statusText}`);
        }

        const data = await response.json();
        window.location.reload();
        console.log('Nutrition data successfully deleted:', data);

    } catch (error) {
        console.error('Error:', error);
    }
});
