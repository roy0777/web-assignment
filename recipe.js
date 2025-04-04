const recipes = {
    // Entree recipes
    'chicken': {
        title: 'Creamy Garlic Chicken',
        duration: '30 minutes',
        ingredients: [
            '4 chicken breasts',
            '4 cloves garlic, minced',
            '1 cup heavy cream',
            '1/2 cup chicken broth',
            '1 tbsp olive oil',
            '1 tbsp butter',
            'Salt and pepper to taste',
            'Fresh parsley for garnish'
        ],
        instructions: [
            'Season chicken breasts with salt and pepper.',
            'Heat olive oil in a large skillet over medium-high heat.',
            'Cook chicken for 5-6 minutes per side until golden and cooked through. Remove and set aside.',
            'In the same pan, add butter and minced garlic. Sauté for 1 minute until fragrant.',
            'Pour in chicken broth and scrape up any browned bits from the pan.',
            'Add heavy cream and bring to a simmer. Cook for 3-4 minutes until slightly thickened.',
            'Return chicken to the pan and spoon sauce over the top. Cook for 2 more minutes.',
            'Garnish with fresh parsley and serve.'
        ]
    },
    'pasta': {
        title: 'Creamy Mushroom Pasta',
        duration: '25 minutes',
        ingredients: [
            '8 oz pasta of choice',
            '8 oz mushrooms, sliced',
            '3 cloves garlic, minced',
            '1 cup heavy cream',
            '1/2 cup parmesan cheese, grated',
            '2 tbsp butter',
            'Salt and pepper to taste',
            'Fresh parsley for garnish'
        ],
        instructions: [
            'Cook pasta according to package instructions. Drain and set aside.',
            'In a large skillet, melt butter over medium heat.',
            'Add mushrooms and cook for 5-6 minutes until golden brown.',
            'Add garlic and cook for 1 minute until fragrant.',
            'Pour in heavy cream and bring to a simmer.',
            'Stir in parmesan cheese until melted and sauce is smooth.',
            'Add cooked pasta to the sauce and toss to coat.',
            'Season with salt and pepper to taste.',
            'Garnish with fresh parsley and serve.'
        ]
    },
    'salmon': {
        title: 'Garlic Butter Salmon',
        duration: '20 minutes',
        ingredients: [
            '4 salmon fillets',
            '4 tbsp butter',
            '4 cloves garlic, minced',
            '1 lemon, juiced',
            '1 tbsp fresh dill, chopped',
            'Salt and pepper to taste'
        ],
        instructions: [
            'Preheat oven to 375°F (190°C).',
            'Season salmon fillets with salt and pepper.',
            'In a small saucepan, melt butter over medium heat.',
            'Add garlic and cook for 1 minute until fragrant.',
            'Stir in lemon juice and dill.',
            'Place salmon on a baking sheet lined with parchment paper.',
            'Pour garlic butter sauce over the salmon fillets.',
            'Bake for 12-15 minutes until salmon is cooked through.',
            'Serve immediately with extra lemon wedges if desired.'
        ]
    },
    // Breakfast recipes
    'waffles': {
        title: 'Homemade Waffles',
        duration: '20 minutes',
        ingredients: [
            '2 cups all-purpose flour',
            '2 tbsp sugar',
            '1 tbsp baking powder',
            '1/2 tsp salt',
            '2 eggs',
            '1 3/4 cups milk',
            '1/2 cup vegetable oil',
            '1 tsp vanilla extract'
        ],
        instructions: [
            'Preheat waffle iron according to manufacturer instructions.',
            'In a large bowl, whisk together flour, sugar, baking powder, and salt.',
            'In another bowl, beat eggs, then add milk, oil, and vanilla extract.',
            'Pour wet ingredients into dry ingredients and mix until just combined.',
            'Pour batter onto preheated waffle iron and cook until golden brown.',
            'Serve with maple syrup, fresh fruit, or whipped cream.'
        ]
    },
    'pancakes': {
        title: 'Fluffy Pancakes',
        duration: '15 minutes',
        ingredients: [
            '1 1/2 cups all-purpose flour',
            '3 1/2 tsp baking powder',
            '1 tsp salt',
            '1 tbsp sugar',
            '1 1/4 cups milk',
            '1 egg',
            '3 tbsp butter, melted'
        ],
        instructions: [
            'In a large bowl, sift together flour, baking powder, salt, and sugar.',
            'Make a well in the center and pour in milk, egg, and melted butter.',
            'Mix until smooth.',
            'Heat a lightly oiled griddle or frying pan over medium-high heat.',
            'Pour batter onto the griddle, using approximately 1/4 cup for each pancake.',
            'Cook until bubbles form and the edges are dry, then flip and cook until browned on the other side.',
            'Serve hot with maple syrup, butter, or fresh fruit.'
        ]
    },
    'Cheesy Casserole': {
        title: 'Cheesy Breakfast Casserole',
        duration: '45 minutes',
        ingredients: [
            '6 eggs',
            '2 cups shredded cheddar cheese',
            '2 cups milk',
            '6 slices bread, cubed',
            '1 lb breakfast sausage, cooked',
            '1/2 tsp salt',
            '1/4 tsp pepper'
        ],
        instructions: [
            'Preheat oven to 350°F (175°C).',
            'Grease a 9x13 inch baking dish.',
            'In a large bowl, whisk together eggs and milk.',
            'Stir in cheese, bread cubes, cooked sausage, salt, and pepper.',
            'Pour mixture into the prepared baking dish.',
            'Bake for 35-40 minutes until set and golden brown on top.',
            'Let stand for 5 minutes before serving.'
        ]
    },
    // Soups
    'Carrot Soup': {
        title: 'Carrot Soup',
        duration: '30 minutes',
        ingredients: [
            '4 large carrots, chopped',
            '1 onion, diced',
            '2 cloves garlic, minced',
            '4 cups vegetable broth',
            '1 cup coconut milk (or heavy cream)',
            '1 tsp salt',
            '1/2 tsp black pepper',
            '1/2 tsp ground cumin',
            '1 tbsp olive oil'
        ],
        instructions: [
            'Heat olive oil in a pot over medium heat. Add onions and garlic, sauté until soft.',
            'Add chopped carrots, salt, pepper, and cumin. Stir for 2 minutes.',
            'Pour in vegetable broth and bring to a boil. Reduce heat and simmer for 20 minutes.',
            'Blend the soup until smooth using a blender or immersion blender.',
            'Stir in coconut milk and heat for 2 minutes. Serve warm.'
        ]
    },
    
    'Lentil Soup': {
        title: 'Lentil Soup',
        duration: '40 minutes',
        ingredients: [
            '1 cup lentils (red or brown), rinsed',
            '1 onion, diced',
            '2 carrots, chopped',
            '2 celery stalks, chopped',
            '2 cloves garlic, minced',
            '4 cups vegetable broth',
            '1 tsp cumin',
            '1 tsp paprika',
            'Salt and pepper to taste',
            '1 tbsp olive oil'
        ],
        instructions: [
            'Heat olive oil in a pot. Add onions, garlic, carrots, and celery. Sauté for 5 minutes.',
            'Add cumin, paprika, and lentils. Stir well.',
            'Pour in vegetable broth and bring to a boil. Reduce heat and simmer for 30 minutes.',
            'Blend for a smooth texture or keep chunky. Adjust seasoning and serve warm.'
        ]
    },

    'Ham and Potato Soup': {
            title: 'Ham and Potato Soup',
            duration: '45 minutes',
            ingredients: [
            '2 cups potatoes, diced',
            '1 cup cooked ham, cubed',
            '1 onion, diced',
            '2 cloves garlic, minced',
            '4 cups chicken broth',
            '1 cup milk',
            '2 tbsp butter',
            '1 tbsp flour',
            'Salt and pepper to taste'
        ],
        instructions: [
            'Melt butter in a pot, add onions and garlic, and cook until soft.',
            'Add flour and stir for 1 minute. Slowly add chicken broth.',
            'Add potatoes and simmer for 20 minutes.',
            'Stir in ham and milk. Cook for 5 more minutes.',
            'Season with salt and pepper. Serve hot.'
        ]
    },

    'Tomato Soup': {
        title: 'Tomato Soup',
        duration: '30 minutes',
        ingredients: [
            '4 large tomatoes, chopped',
            '1 onion, diced',
            '2 cloves garlic, minced',
            '3 cups vegetable broth',
            '1 tbsp tomato paste',
            '1 tsp sugar',
            '1/2 tsp salt',
            '1/2 tsp pepper',
            '1 tbsp olive oil'
        ],
        instructions: [
            'Heat olive oil in a pot, sauté onions and garlic until fragrant.',
            'Add chopped tomatoes, tomato paste, sugar, salt, and pepper. Stir well.',
            'Pour in vegetable broth and simmer for 20 minutes.',
            'Blend until smooth. Serve hot.'
        ]
    },

//Pastries
    'Fruit Tarts': {
        title: 'Fruit Tarts',
        duration: '1 hour',
        ingredients: [
            '1 sheet puff pastry',
            '1 cup custard (or vanilla pudding)',
            '1 cup mixed fruits (berries, kiwi, mango, etc.)',
            '2 tbsp honey'
        ],
        instructions: [
            'Preheat oven to 375°F (190°C).',
            'Cut pastry into tart shapes and bake for 15 minutes. Let cool.',
            'Spread custard over each tart shell.',
            'Arrange fruit on top and drizzle with honey. Serve chilled.'
        ]
    },
    'Chocolate Mousse': {
        title: 'Chocolate Mousse',
        duration: '2 hours',
        ingredients: [
            '200g dark chocolate',
            '1 cup heavy cream',
            '2 egg yolks',
            '2 tbsp sugar',
            '1 tsp vanilla extract'
        ],
        instructions: [
            'Melt chocolate in a bowl over simmering water. Let cool.',
            'Whisk egg yolks and sugar until creamy.',
            'Whip heavy cream until soft peaks form.',
            'Fold melted chocolate into the whipped cream.',
            'Chill for 2 hours before serving.'
        ]
    },
    'Karachi': {
        title: 'Karachi Biryani',
        duration: '1 hour',
        ingredients: [
            "2 cups basmati rice",
            "1 lb chicken, cut into pieces",
            "2 onions, sliced",
            "2 tomatoes, chopped",
            "2 tbsp biryani masala",
            "1 cup yogurt",
            "1/2 tsp turmeric",
            "1/2 tsp chili powder",
            "2 tbsp oil",
            "2 cups water"
            ],
        instructions: [
            "Heat oil, fry onions until golden. Add chicken, tomatoes, and spices. Cook for 10 minutes.",
            "Add yogurt, mix well, and simmer for another 10 minutes.",
            "Cook rice separately until half done.",
            "Layer rice over the chicken mixture and cook on low heat for 15 minutes. Serve hot."
        ]

    },
//Appetizers
    'Island': {
        title: 'Tropical Shrimp Bites',
        duration: '20 minutes',
        ingredients: [
            "12 large shrimp, peeled and deveined",
            "1 cup pineapple chunks",            
            "1 small red bell pepper, diced",            
            "1 small cucumber, sliced",            
            "1 tbsp lime juice",            
            "1 tbsp honey",            
            "1 tsp chili powder",            
            "1 tbsp olive oil",            
            "Fresh cilantro for garnish",            
            "Mini skewers or toothpicks"
        ],
        instructions: [
            "In a bowl, mix lime juice, honey, chili powder, and olive oil.",
            "Toss the shrimp in the marinade and let sit for 5 minutes.",
            "Heat a pan over medium-high heat and cook the shrimp for 2 minutes per side until pink.",
            "Assemble skewers by layering a pineapple chunk, shrimp, red bell pepper, and cucumber slice.",
            "Garnish with fresh cilantro and serve."
        ]
    },
    'Shrimp Cocktail': {
        title: 'Shrimp Cocktail',
        duration: '15 minutes',
        ingredients: [
            "1 lb large shrimp, peeled and deveined",
            "4 cups water",
            "1 tbsp salt",
            "1 lemon, sliced",
            "1 cup ketchup",
            "2 tbsp horseradish",
            "1 tbsp lemon juice",
            "1 tsp hot sauce",
            "1 tsp Worcestershire sauce"
    ],
    instructions: [
            "Bring water, salt, and lemon slices to a boil in a pot.",
            "Add shrimp and cook for 2-3 minutes until pink and opaque. Drain and chill.",
            "In a bowl, mix ketchup, horseradish, lemon juice, hot sauce, and Worcestershire sauce to make the cocktail sauce.",
            "Serve shrimp chilled with the cocktail sauce."
    ]
},
    'Vegetable Skewer': {
        title: 'Vegetable Skewer',
        duration: '25 minutes',
        ingredients: [
            "1 zucchini, sliced",
            "1 red bell pepper, cut into squares",
            "1 yellow bell pepper, cut into squares",
            "1 red onion, cut into chunks",
            "8 cherry tomatoes",
            "2 tbsp olive oil",
            "1 tsp salt",
            "1 tsp black pepper",
            "1 tsp garlic powder",
            "1 tsp dried oregano"
],
instructions: [
            "Preheat the grill or oven to 375°F (190°C).",
            "In a bowl, mix olive oil, salt, black pepper, garlic powder, and oregano.",
            "Thread vegetables onto skewers and brush with seasoning.",
            "Grill for 10-12 minutes, turning occasionally, until charred and tender.",
            "Serve warm."
]
    },
//Beverages
    'Philippine': {
        title: 'Adobo',
        duration: '50 minutes',
        ingredients: [
            '1 lb chicken or pork',
            '1/2 cup soy sauce',
            '1/2 cup vinegar',
            '1 onion, chopped',
            '4 garlic cloves, minced',
            '1 tsp black pepper',
            '2 bay leaves'
],
instructions: [
            'Marinate meat in soy sauce and garlic for 30 minutes.',
            'Heat a pan, sauté onions. Add marinated meat.',
            'Pour in vinegar, bay leaves, and black pepper. Simmer for 20 minutes.',
            'Serve with rice.'
    ]
    },

    'Cold Drinks': {
        title: 'Mango Lassi',
        duration: '10 minutes',
        ingredients: [
            '1 cup mango pulp',
            '1 cup yogurt',
            '1/2 cup milk',
            '2 tbsp sugar',
            'Ice cubes'
        ],
        instructions: [
            'Blend all ingredients until smooth.',
            'Serve chilled.'
        ]
    },
    'Indian': {
        title: 'Butter Chicken',
        duration: '1 hour',
        ingredients: [
            "1 lb boneless chicken, cubed",
            "1 cup yogurt",
            "2 tbsp butter",
            "1 onion, finely chopped",
            "2 cloves garlic, minced",
            "1-inch ginger, grated",
            "1 cup tomato puree",
            "1 tbsp garam masala",
            "1 tsp turmeric",
            "1 tsp chili powder",
            "1/2 cup heavy cream",
            "Salt to taste",
            "Fresh cilantro for garnish"
],
instructions: [
            "Marinate the chicken in yogurt, turmeric, chili powder, and salt for 30 minutes.",
            "Heat butter in a pan and sauté onions, garlic, and ginger until fragrant.",
            "Add tomato puree and cook for 10 minutes.",
            "Stir in garam masala and marinated chicken. Cook for 15 minutes until done.",
            "Add heavy cream and simmer for 5 minutes.",
            "Garnish with fresh cilantro and serve with rice or naan."
]
    },

    //Vegan Section
    'Vegan Tortillas': {
        title: 'Vegan Tortillas',
        duration: '30 minutes',
        ingredients: [
            '2 cups all-purpose flour',
            '1/2 tsp salt',
            '1/2 cup water',
            '2 tbsp olive oil'
        ],
        instructions: [
            'In a bowl, mix flour and salt.',
            'Add water and olive oil. Knead until smooth.',
            'Divide into balls, roll out thinly.',
            'Cook on a hot skillet for 1-2 minutes each side.'   
        ]
    },
    'Vegetable Fritters': {
        title: ' Vegetable Fritters',
        duration: '30 minutes',
        ingredients: [
            "1 cup grated zucchini",
            "1 cup grated carrot",
            "1/2 cup flour",
            "1 egg (or flax egg for vegan)",
            "Salt and pepper"
        ],
        instructions: [
            "Mix all ingredients into a batter.",
            "Fry in oil until golden brown."
        ]
    },
    'Ratatouille': {
        title: 'Ratatouille',
        duration: '1hr',
        ingredients: [
            "1 zucchini, sliced",
            "1 eggplant, sliced",
            "2 tomatoes, sliced",
            "1 bell pepper, chopped",
            "2 cloves garlic, minced",
            "2 tbsp olive oil"
    ],
    instructions: [
            "Sauté garlic in olive oil, add bell pepper.",
            "Arrange zucchini, eggplant, and tomatoes in a dish.",
            "Bake at 375°F (190°C) for 40 minutes. Serve warm."
    ]
},
};

// Function to show recipe popup
function showRecipe(recipeId) {
    const recipe = recipes[recipeId];
    
    // If recipe exists in our data
    if (recipe) {
        // Set recipe details in popup
        document.getElementById('recipe-title').textContent = recipe.title;
        document.getElementById('recipe-duration').textContent = `Preparation time: ${recipe.duration}`;
        
        // Clear and populate ingredients list
        const ingredientsList = document.getElementById('recipe-ingredients');
        ingredientsList.innerHTML = '';
        recipe.ingredients.forEach(ingredient => {
            const li = document.createElement('li');
            li.textContent = ingredient;
            ingredientsList.appendChild(li);
        });
        
        // Clear and populate instructions list
        const instructionsList = document.getElementById('recipe-instructions');
        instructionsList.innerHTML = '';
        recipe.instructions.forEach(instruction => {
            const li = document.createElement('li');
            li.textContent = instruction;
            instructionsList.appendChild(li);
        });
        
        // Show the popup
        document.getElementById('recipe-popup').style.display = 'block';
        document.body.classList.add('no-scroll'); // Prevent background scrolling
    } else {
        // If recipe doesn't exist in our data yet
        alert('Recipe details coming soon!');
    }
}

function closeRecipe() {
    document.getElementById('recipe-popup').style.display = 'none';
    document.body.classList.remove('no-scroll'); // Re-enable background scrolling
}

// Close popup when clicking outside of it
window.onclick = function(event) {
    const popup = document.getElementById('recipe-popup');
    if (event.target === popup) {
        closeRecipe();
    }
}

// Function to like a recipe
function likeRecipe(recipeId) {
    fetch(`like_recipe.php?recipe_id=${recipeId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(data.message);
                location.reload(); // Reload the page to update the favorites list
            } else {
                alert('Failed to like the recipe.');
            }
        })
        .catch(error => {
            console.error('Error liking recipe:', error);
        });
}

// Close popup when clicking outside of it
window.onclick = function(event) {
    const popup = document.getElementById('recipe-popup');
    if (event.target === popup) {
        popup.style.display = 'none';
    }
}