// src/heroService.js
export const fetchHeroes = async () => {
    const response = await fetch('https://your-api-url/heroes');
    if (!response.ok) {
        throw new Error('Failed to fetch heroes');
    }
    return await response.json();
}
