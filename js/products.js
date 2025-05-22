

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


// js/products.js
const products = {
   1: {
    name: "Elegant Cat",
    image: "https://i.ibb.co/0pjgtrjr/494825075-1100023805358988-7869408859538142053-n.jpg ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "A sophisticated feline portrait with digital watercolor textures.",
    reviews: []
},
2: {
    name: "Sophisticated Tom",
    image: "https://i.ibb.co/DPZsnMjn/494818465-1210702057134480-4556401831919401196-n.jpg ",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Classic tomcat illustration with vintage aesthetics.",
    reviews: []
},
3: {
    name: "Lech's Favorite",
    image: "https://i.ibb.co/svDZSgC7/494359212-1221382426332389-7029884708858703133-n.jpg ",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Playful character design with bold colors.",
    reviews: []
},
4: {
    name: "C0te Cat",
    image: "https://i.ibb.co/NgcbFcT9/494815821-1388651155503317-4690645572417082193-n.png ",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Cyberpunk-inspired feline with neon accents.",
    reviews: []
},
5: {
    name: "Lizard Hunter",
    image: "https://i.ibb.co/2QcvwCm/494360146-1400362487890440-597695839766592943-n.png ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Dynamic action pose of a hunting cat.",
    reviews: []
},
6: {
    name: "Simba",
    image: "https://i.ibb.co/d4NmfWJG/494362025-1408138887005682-7169189609504204508-n.jpg ",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Regal lion portrait with golden tones.",
    reviews: []
},
7: {
    name: "Manyak na posa",
    image: "https://i.ibb.co/ccrcWj4q/494819403-1875332939988552-5442490914021247960-n.jpg ",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Whimsical cartoon-style cat illustration.",
    reviews: []
},
8: {
    name: "Banal na aso",
    image: "https://i.ibb.co/Q3C9mMn3/494858168-1946943209382697-6665512090529875013-n.jpg ",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Satirical dog portrait with religious motifs.",
    reviews: []
},

// PAGE 2 PRODUCTS (IDs 9-16)
9: {
    name: "Smittenbadoobee",
    image: "https://i.ibb.co/4RBCSgxs/tshirt-design-admit-it-you-re-smitten.png ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Bold graphic t-shirt design with playful typography.",
    reviews: []
},
10: {
    name: "No Pressure (LP)",
    image: "https://i.ibb.co/PGVz0TYZ/no-pressure-1.png ",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Minimalist layout with abstract line art.",
    reviews: []
},
11: {
    name: "No Pressure (EP)",
    image: "https://i.ibb.co/cSKhb2Cj/no-pressure-2.png ",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Compact version of the 'No Pressure' design series.",
    reviews: []
},
12: {
    name: "Hot Mulligan",
    image: "https://i.ibb.co/fzZwC8ZG/hot-ulligan.png ",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Energetic design with punk rock influences.",
    reviews: []
},
13: {
    name: "Smitten (Black)",
    image: "https://i.ibb.co/5WkSSvdj/tshirt-design-admit-it-you-re-smitten-dark.png ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Dark version of the Smitten design for contrast lovers.",
    reviews: []
},
14: {
    name: "Finding Beauty in Negative Spaces",
    image: "https://i.ibb.co/RpcfSG0T/finding-beauty-tshirt.png ",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Philosophical design focusing on minimalist negative space art.",
    reviews: []
},
15: {
    name: "Isolate and Medicate",
    image: "https://i.ibb.co/Z6Cqcr5L/isolate-and-medicate-mockup.png ",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Humorous take on modern life stress relief.",
    reviews: []
},
16: {
    name: "Cat Milf",
    image: "https://i.ibb.co/G4brT7dS/cat-milf.png ",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Contemporary style with a cheeky twist.",
    reviews: []
},

// PAGE 3 PRODUCTS (IDs 17-24)
17: {
    name: "Shit Eater",
    image: "https://i.ibb.co/pvt33FyH/shit-eater.jpg ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Abstract and edgy digital illustration.",
    reviews: []
},
18: {
    name: "Cat and Criminal",
    image: "https://i.ibb.co/twWFWYq4/cat-and-criminal.jpg ",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Stylized noir-themed artwork featuring a cat and a gangster.",
    reviews: []
},
19: {
    name: "Single Braincell Car",
    image: "https://i.ibb.co/4nGr2Ztf/1-braincell-car.jpg ",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Surreal car design with minimalist brain motif.",
    reviews: []
},
20: {
    name: "Slipper Muncher",
    image: "https://i.ibb.co/5WBk9FF1/slipper-muncher.jpg ",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Cartoonish creature devouring a slipper.",
    reviews: []
},
21: {
    name: "Posang Mabantot",
    image: "https://i.ibb.co/v6fCp2N7/posang-mabantot.jpg ",
    price: "₱4,250",
    originalPrice: "₱5,000",
    discount: "-15%",
    description: "Chubby cat character with humorous expression.",
    reviews: []
},
22: {
    name: "Ma Ano Ulam?",
    image: "https://i.ibb.co/nsnP4M8Q/ma-ano-ulam.png ",
    price: "₱5,600",
    originalPrice: "₱7,000",
    discount: "-20%",
    description: "Illustration inspired by Filipino culture and humor.",
    reviews: []
},
23: {
    name: "Kung Fu Mulutan",
    image: "https://i.ibb.co/DPZwfj34/kung-portrait.png ",
    price: "₱3,150",
    originalPrice: "₱3,500",
    discount: "-10%",
    description: "Fusion of martial arts and local humor in visual form.",
    reviews: []
},
24: {
    name: "BulSU Sarmiento Branch",
    image: "https://i.ibb.co/MxfjbGRR/sarming-portrait-try.png ",
    price: "₱6,750",
    originalPrice: "₱9,000",
    discount: "-25%",
    description: "Digital portrait inspired by Bulacan State University’s branch campus.",
    reviews: []
},
25: {
  name: "Bea Baduday 1",
  image: "https://i.ibb.co/XrkyfdDq/Bea-Baduday.jpg",
  price: "₱4,500",
  originalPrice: "₱9,000",
  discount: "-50%",
  description: "Beabadoobee tour poster",
  reviews: []
},
26: {
  name: "Bea Baduday 2",
  image: "https://i.ibb.co/VYzJSy3p/Bea-Baduday2.jpg",
  price: "₱2,400",
  originalPrice: "₱6,000",
  discount: "-60%",
  description: "Indie pop vibes from Beabadoobee’s tour.",
  reviews: []
},
27: {
  name: "Bea Baduday 3",
  image: "https://i.ibb.co/HpknrHQ9/Bea-Baduday-3.jpg",
  price: "₱3,000",
  originalPrice: "₱7,500",
  discount: "-60%",
  description: "Soft grunge aesthetic from Bea’s concert set.",
  reviews: []
},
28: {
  name: "Apple ni Bea",
  image: "https://i.ibb.co/ynHNhR1R/Apple.jpg",
  price: "₱2,200",
  originalPrice: "₱5,500",
  discount: "-60%",
  description: "A cheeky nod to Beabadoobee's playful side.",
  reviews: []
},
29: {
  name: "TV Girl 1",
  image: "https://i.ibb.co/HDh7dXGY/TV-Girl.jpg",
  price: "₱3,200",
  originalPrice: "₱6,400",
  discount: "-50%",
  description: "Retro dream pop poster from TV Girl.",
  reviews: []
},
30: {
  name: "TV Girl 2",
  image: "https://i.ibb.co/KptsXwKy/TV-Girl-2.jpg",
  price: "₱1,800",
  originalPrice: "₱4,500",
  discount: "-60%",
  description: "Vintage aesthetic for nostalgic souls.",
  reviews: []
},
31: {
  name: "Perks of being a Wallflower",
  image: "https://i.ibb.co/20TGDY4f/Wallflower.jpg",
  price: "₱3,600",
  originalPrice: "₱6,000",
  discount: "-40%",
  description: "Iconic film poster for book lovers.",
  reviews: []
},
32: {
  name: "The End of the F***king World",
  image: "https://i.ibb.co/SwPPn1yn/The-End.jpg",
  price: "₱3,300",
  originalPrice: "₱6,600",
  discount: "-50%",
  description: "Dark teen drama in artistic layout.",
  reviews: []
},
33: {
  name: "Clairo",
  image: "https://i.ibb.co/dJLdRgZK/Clairo.jpg",
  price: "₱2,700",
  originalPrice: "₱6,000",
  discount: "-55%",
  description: "Lo-fi bedroom pop poster design.",
  reviews: []
},
34: {
  name: "Chappell Roan 1",
  image: "https://i.ibb.co/VWYGCRFG/Chappell.jpg",
  price: "₱2,400",
  originalPrice: "₱6,000",
  discount: "-60%",
  description: "Theatrical flair from rising alt-pop star.",
  reviews: []
},
35: {
  name: "Chappell Roan 2",
  image: "https://i.ibb.co/jkHt7m0f/Chappell-2.jpg",
  price: "₱3,000",
  originalPrice: "₱6,000",
  discount: "-50%",
  description: "Bold, colorful expression from Chappell.",
  reviews: []
},
36: {
  name: "Mitski",
  image: "https://i.ibb.co/bDmzwz0/Mitski.jpg",
  price: "₱2,200",
  originalPrice: "₱5,500",
  discount: "-60%",
  description: "Emotional intensity in every pixel.",
  reviews: []
},
37: {
  name: "500 Days of Summer",
  image: "https://i.ibb.co/B2X2dpjh/Summer.jpg",
  price: "₱2,000",
  originalPrice: "₱4,000",
  discount: "-50%",
  description: "Whimsical and melancholic film classic.",
  reviews: []
},
38: {
  name: "Juno 1",
  image: "https://i.ibb.co/99M3SSwK/Juno.jpg",
  price: "₱2,400",
  originalPrice: "₱6,000",
  discount: "-60%",
  description: "Quirky teen spirit in warm hues.",
  reviews: []
},
39: {
  name: "Juno 2",
  image: "https://i.ibb.co/93qGb4mB/Juno-2.jpg",
  price: "₱2,700",
  originalPrice: "₱5,400",
  discount: "-50%",
  description: "Playful yet deep like the film itself.",
  reviews: []
},
40: {
  name: "Twilight Saga",
  image: "https://i.ibb.co/bgcCBd1g/Twilight.jpg",
  price: "₱3,000",
  originalPrice: "₱6,000",
  discount: "-50%",
  description: "Eternal love and dramatic glances.",
  reviews: []
},
41: {
  name: "Lady Bird",
  image: "https://i.ibb.co/pj4FKwdd/Lady-Bird.jpg",
  price: "₱2,000",
  originalPrice: "₱5,000",
  discount: "-60%",
  description: "Coming-of-age charm from Lady Bird.",
  reviews: []
},
42: {
  name: "The Beatles",
  image: "https://i.ibb.co/99pdcqjg/The-Beatles.jpg",
  price: "₱3,600",
  originalPrice: "₱6,000",
  discount: "-40%",
  description: "Classic band poster for timeless fans.",
  reviews: []
},
43: {
  name: "Sabrina Karpintero",
  image: "https://i.ibb.co/KcWsL8cN/Sabrina.jpg",
  price: "₱2,100",
  originalPrice: "₱5,250",
  discount: "-60%",
  description: "Pop princess with a bold visual flair.",
  reviews: []
},
44: {
  name: "Take A Bite",
  image: "https://i.ibb.co/Z1XvzpnP/Take-A-Bite.jpg",
  price: "₱2,800",
  originalPrice: "₱7,000",
  discount: "-60%",
  description: "Tantalizing cover art with attitude.",
  reviews: []
}

};

// Load auth modal
const script = document.createElement('script');
script.src = 'js/auth-modal.js';
document.head.appendChild(script);
