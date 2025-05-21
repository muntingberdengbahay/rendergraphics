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
}
};