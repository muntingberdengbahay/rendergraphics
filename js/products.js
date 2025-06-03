

// For product cards (multiple products)
if (window.location.pathname.includes("product.html")) {
    document.querySelectorAll('.product-card').forEach(card => {
        const stars = card.querySelectorAll('.stars i');
        let currentRating = 0;

        stars.forEach((star, index) => {
            star.addEventListener('mouseover', () => {
                stars.forEach((s, i) => {
                    s.classList.toggle('fas', i <= index);
                    s.classList.toggle('far', i > index);
                });
            });

            star.addEventListener('mouseout', () => {
                stars.forEach((s, i) => {
                    s.classList.toggle('fas', i < currentRating);
                    s.classList.toggle('far', i >= currentRating);
                });
            });

            star.addEventListener('click', (event) => {
                event.stopPropagation();
                currentRating = index + 1;
                stars.forEach((s, i) => {
                    s.classList.toggle('fas', i < currentRating);
                    s.classList.toggle('far', i >= currentRating);
                });
                card.querySelector('.rating-count').textContent = `(${currentRating})`;
            });
        });
    });
}

// For single product detail (only one)
const detailStars = document.querySelectorAll('main.product-detail .stars i');
let detailCurrentRating = 0;

detailStars.forEach((star, index) => {
    star.addEventListener('mouseover', () => {
        detailStars.forEach((s, i) => {
            s.classList.toggle('fas', i <= index);
            s.classList.toggle('far', i > index);
        });
    });

    star.addEventListener('mouseout', () => {
        detailStars.forEach((s, i) => {
            s.classList.toggle('fas', i < detailCurrentRating);
            s.classList.toggle('far', i >= detailCurrentRating);
        });
    });

    star.addEventListener('click', (event) => {
        event.stopPropagation();
        detailCurrentRating = index + 1;
        detailStars.forEach((s, i) => {
            s.classList.toggle('fas', i < detailCurrentRating);
            s.classList.toggle('far', i >= detailCurrentRating);
        });
        document.querySelector('main.product-detail .rating-count').textContent = `(${detailCurrentRating})`;
    });
});

// products.js
document.addEventListener('DOMContentLoaded', () => {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');

    const allProducts = document.querySelectorAll('.product-card');

    if (category) {
        allProducts.forEach(card => {
            const productCategory = card.getAttribute('data-category');
            if (productCategory === category) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    }
});

function syncWatermarkSize() {
  const productImg = document.getElementById('product-image');
  const watermark = document.querySelector('.watermark-image');
  
  if (productImg && watermark) {
    // Match watermark dimensions to product image
    watermark.style.width = productImg.offsetWidth + 'px';
    watermark.style.height = productImg.offsetHeight + 'px';
  }
}

// Initialize on load
document.addEventListener('DOMContentLoaded', function() {
  const productImg = document.getElementById('product-image');
  
  // Run when image loads and on resize
  productImg.addEventListener('load', syncWatermarkSize);
  window.addEventListener('resize', syncWatermarkSize);
  
  // Initial sync (in case image is cached)
  if (productImg.complete) syncWatermarkSize();
});



// js/products.js
const products = {
   1: {
    name: "Elegant Cat",
    image: "watermarked_image.php?img=Elegant Cat.jpg",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "A sophisticated feline portrait with digital watercolor textures.",
    reviews: []
},
2: {
    name: "Sophisticated Tom",
    image: "watermarked_image.php?img=Sophisticated Tom.jpg",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Classic tomcat illustration with vintage aesthetics.",
    reviews: []
},
3: {
    name: "Lech's Favorite",
    image: "watermarked_image.php?img=Lech_s Favorite.jpg",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Playful character design with bold colors.",
    reviews: []
},
4: {
    name: "C0te Cat",
    image: "watermarked_image.php?img=C0te Cat.png",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Cyberpunk-inspired feline with neon accents.",
    reviews: []
},
5: {
    name: "Lizard Hunter",
    image: "watermarked_image.php?img=Lizard Hunter.png ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Dynamic action pose of a hunting cat.",
    reviews: []
},
6: {
    name: "Simba",
    image: "watermarked_image.php?img=Simba.jpg",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Regal lion portrait with golden tones.",
    reviews: []
},
7: {
    name: "Manyak na posa",
    image: "watermarked_image.php?img=Manyak na posa.jpg",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Whimsical cartoon-style cat illustration.",
    reviews: []
},
8: {
    name: "Banal na aso",
    image: "watermarked_image.php?img=Banal na aso.jpg",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Satirical dog portrait with religious motifs.",
    reviews: []
},

// PAGE 2 PRODUCTS (IDs 9-16)
9: {
    name: "Smittenbadoobee",
    image: "watermarked_image.php?img=Smittenbadoobee.png",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Bold graphic t-shirt design with playful typography.",
    reviews: []
},
10: {
    name: "No Pressure (LP)",
    image: "watermarked_image.php?img=No Pressure (LP).png",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Minimalist layout with abstract line art.",
    reviews: []
},
11: {
    name: "No Pressure (EP)",
    image: "watermarked_image.php?img=No Pressure (EP).png",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Compact version of the 'No Pressure' design series.",
    reviews: []
},
12: {
    name: "Hot Mulligan",
    image: "watermarked_image.php?img=Hot Mulligan.png",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Energetic design with punk rock influences.",
    reviews: []
},
13: {
    name: "Smitten (Black)",
    image: "watermarked_image.php?img=Smitten (Black).png",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Dark version of the Smitten design for contrast lovers.",
    reviews: []
},
14: {
    name: "Finding Beauty in Negative Spaces",
    image: "watermarked_image.php?img=Finding Beauty in Negative Spaces.png",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Philosophical design focusing on minimalist negative space art.",
    reviews: []
},
15: {
    name: "Isolate and Medicate",
    image: "watermarked_image.php?img=Isolate and Medicate.png",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Humorous take on modern life stress relief.",
    reviews: []
},
16: {
    name: "Cat Milf",
    image: "watermarked_image.php?img=Cat Milf.png",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Contemporary style with a cheeky twist.",
    reviews: []
},

// PAGE 3 PRODUCTS (IDs 17-24)
17: {
    name: "Shit Eater",
    image: "watermarked_image.php?img=Shit Eater.jpg ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Abstract and edgy digital illustration.",
    reviews: []
},
18: {
    name: "Cat and Criminal",
    image: "watermarked_image.php?img=Cat and Criminal.jpg",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Stylized noir-themed artwork featuring a cat and a gangster.",
    reviews: []
},
19: {
    name: "Single Braincell Car",
    image: "watermarked_image.php?img=Single Braincell Car.jpg",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Surreal car design with minimalist brain motif.",
    reviews: []
},
20: {
    name: "Slipper Muncher",
    image: "watermarked_image.php?img=Slipper Muncher.jpg",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Cartoonish creature devouring a slipper.",
    reviews: []
},
21: {
    name: "Posang Mabantot",
    image: "watermarked_image.php?img=Posang Mabantot.jpg",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Chubby cat character with humorous expression.",
    reviews: []
},
22: {
    name: "Ma Ano Ulam?",
    image: "watermarked_image.php?img=Ma Ano Ulam.png",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Illustration inspired by Filipino culture and humor.",
    reviews: []
},
23: {
    name: "Kung Fu Mulutan",
    image: "watermarked_image.php?img=Kung Fu Mulutan.png",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Fusion of martial arts and local humor in visual form.",
    reviews: []
},
24: {
    name: "BulSU Sarmiento Branch",
    image: "watermarked_image.php?img=BulSU Sarmiento Branch.png",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Digital portrait inspired by Bulacan State University’s branch campus.",
    reviews: []
},
25: {
  name: "Bea Baduday 1",
  image: "watermarked_image.php?img=Bea Baduday 1.jpg",
  price: "₱4,500",
  originalPrice: "₱9,000",
  discount: "-50%",
  description: "Beabadoobee tour poster",
  reviews: []
},
26: {
  name: "Bea Baduday 2",
  image: "watermarked_image.php?img=Bea Baduday2.jpg",
  price: "₱2,400",
  originalPrice: "₱6,000",
  discount: "-60%",
  description: "Indie pop vibes from Beabadoobee’s tour.",
  reviews: []
},
27: {
  name: "Bea Baduday 3",
  image: "watermarked_image.php?img=Bea Baduday 3.jpg",
  price: "₱3,000",
  originalPrice: "₱7,500",
  discount: "-60%",
  description: "Soft grunge aesthetic from Bea’s concert set.",
  reviews: []
},
28: {
  name: "Apple ni Bea",
  image: "watermarked_image.php?img=Apple ni Bea.jpg",
  price: "₱2,200",
  originalPrice: "₱5,500",
  discount: "-60%",
  description: "A cheeky nod to Beabadoobee's playful side.",
  reviews: []
},
29: {
  name: "TV Girl 1",
  image: "watermarked_image.php?img=TV Girl 1.jpg",
  price: "₱3,200",
  originalPrice: "₱6,400",
  discount: "-50%",
  description: "Retro dream pop poster from TV Girl.",
  reviews: []
},
30: {
  name: "TV Girl 2",
  image: "watermarked_image.php?img=TV Girl 2.jpg",
  price: "₱1,800",
  originalPrice: "₱4,500",
  discount: "-60%",
  description: "Vintage aesthetic for nostalgic souls.",
  reviews: []
},
31: {
  name: "Perks of being a Wallflower",
  image: "watermarked_image.php?img=Perks of being a Wallflower.jpg",
  price: "₱3,600",
  originalPrice: "₱6,000",
  discount: "-40%",
  description: "Iconic film poster for book lovers.",
  reviews: []
},
32: {
  name: "The End of the F***king World",
  image: "watermarked_image.php?img=The End of the Fking World.jpg",
  price: "₱3,300",
  originalPrice: "₱6,600",
  discount: "-50%",
  description: "Dark teen drama in artistic layout.",
  reviews: []
},
33: {
  name: "Clairo",
  image: "watermarked_image.php?img=Clairo.jpg",
  price: "₱2,700",
  originalPrice: "₱6,000",
  discount: "-55%",
  description: "Lo-fi bedroom pop poster design.",
  reviews: []
},
34: {
  name: "Chappell Roan 1",
  image: "watermarked_image.php?img=Chappell Roan 1.jpg",
  price: "₱2,400",
  originalPrice: "₱6,000",
  discount: "-60%",
  description: "Theatrical flair from rising alt-pop star.",
  reviews: []
},
35: {
  name: "Chappell Roan 2",
  image: "watermarked_image.php?img=Chappell Roan 2.jpg",
  price: "₱3,000",
  originalPrice: "₱6,000",
  discount: "-50%",
  description: "Bold, colorful expression from Chappell.",
  reviews: []
},
36: {
  name: "Mitski",
  image: "watermarked_image.php?img=Mitski.jpg",
  price: "₱2,200",
  originalPrice: "₱5,500",
  discount: "-60%",
  description: "Emotional intensity in every pixel.",
  reviews: []
},
37: {
  name: "500 Days of Summer",
  image: "watermarked_image.php?img=500 Days of Summer.jpg",
  price: "₱2,000",
  originalPrice: "₱4,000",
  discount: "-50%",
  description: "Whimsical and melancholic film classic.",
  reviews: []
},
38: {
  name: "Juno 1",
  image: "watermarked_image.php?img=Juno 1.jpg",
  price: "₱2,400",
  originalPrice: "₱6,000",
  discount: "-60%",
  description: "Quirky teen spirit in warm hues.",
  reviews: []
},
39: {
  name: "Juno 2",
  image: "watermarked_image.php?img=Juno 2.jpg",
  price: "₱2,700",
  originalPrice: "₱5,400",
  discount: "-50%",
  description: "Playful yet deep like the film itself.",
  reviews: []
},
40: {
  name: "Twilight Saga",
  image: "watermarked_image.php?img=Twilight Saga.jpg",
  price: "₱3,000",
  originalPrice: "₱6,000",
  discount: "-50%",
  description: "Eternal love and dramatic glances.",
  reviews: []
},
41: {
  name: "Lady Bird",
  image: "watermarked_image.php?img=Lady Bird.jpg",
  price: "₱2,000",
  originalPrice: "₱5,000",
  discount: "-60%",
  description: "Coming-of-age charm from Lady Bird.",
  reviews: []
},
42: {
  name: "The Beatles",
  image: "watermarked_image.php?img=The Beatles.jpg",
  price: "₱3,600",
  originalPrice: "₱6,000",
  discount: "-40%",
  description: "Classic band poster for timeless fans.",
  reviews: []
},
43: {
  name: "Sabrina Karpintero",
  image: "watermarked_image.php?img=Sabrina Karpintero.jpg",
  price: "₱2,100",
  originalPrice: "₱5,250",
  discount: "-60%",
  description: "Pop princess with a bold visual flair.",
  reviews: []
},
44: {
  name: "Take A Bite",
  image: "watermarked_image.php?img=Take A Bite.jpg",
  price: "₱2,800",
  originalPrice: "₱7,000",
  discount: "-60%",
  description: "Tantalizing cover art with attitude.",
  reviews: []
},
 
45: {
    name: "Depressed Swine",
  image: "watermarked_image.php?img=images/art_6836a782113de5.78697428.jpg",
  price: "₱5,000",
  originalPrice: "₱6,000",
  discount: "-20%",
  description: "When the feeling of burden falls into heavy heart. The stomach wants to eat Korean BBQ, Samgyupsal pork is the way",
  reviews: []
}

 

 


 };

// Load auth modal
const script = document.createElement('script');
script.src = 'js/auth-modal.js';
document.head.appendChild(script);