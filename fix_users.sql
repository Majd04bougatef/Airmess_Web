-- Fix statut column
UPDATE users 
SET statut = 'active' 
WHERE statut IS NULL;

-- Fix roleUser column
UPDATE users 
SET roleUser = 'ROLE_USER' 
WHERE roleUser IS NULL;

-- Fix diamond column
UPDATE users 
SET diamond = 0 
WHERE diamond IS NULL;

-- Fix deleteFlag column
UPDATE users 
SET deleteFlag = 0 
WHERE deleteFlag IS NULL;

-- Fix imagesU column
UPDATE users 
SET imagesU = 'default.jpg' 
WHERE imagesU IS NULL;

-- Fix name and prenom columns
UPDATE users 
SET name = 'User' 
WHERE name IS NULL;

UPDATE users 
SET prenom = 'Default' 
WHERE prenom IS NULL;

-- Fix phoneNumber column
UPDATE users 
SET phoneNumber = '0000000000' 
WHERE phoneNumber IS NULL;

-- Fix dateNaiss column
UPDATE users 
SET dateNaiss = CURRENT_DATE 
WHERE dateNaiss IS NULL; 