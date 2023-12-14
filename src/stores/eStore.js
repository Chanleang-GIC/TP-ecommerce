import bigpic1 from '../assets/Cms-04 1.png'
import bigpic2 from '../assets/Cat-01 1.png'
import bigpic3 from '../assets/Cms-03 1.png'
  
import img1 from '../assets/cat-13 1.png'
import img2 from '../assets/cat-11 1.png'
import img3 from '../assets/cat-12 1.png'
import img4 from '../assets/cat-9 1.png'
import img5 from '../assets/cat-3 1.png'
import img6 from '../assets/cat-4 1.png'
import img7 from '../assets/cat-1 4.png'
import img8 from '../assets/cat-15 1.png'
import img9 from '../assets/cat-14 1.png'
import img10 from '../assets/cat-7 1.png'


import Pimg1 from '../assets/18 1.png'
import Pimg2 from '../assets/corn.png'
import Pimg3 from '../assets/orange.png'
import Pimg4 from '../assets/pepper.png'
import Pimg5 from '../assets/lemon1.png'
import Pimg6 from '../assets/meat.png'
import Pimg7 from '../assets/lemon.png'
import Pimg8 from '../assets/steak.png'
import Pimg9 from '../assets/wrinkysteak.png'
import Pimg10 from '../assets/garlic.png'

import { defineStore  } from 'pinia'

export const useEStore = defineStore('todoList', {
  state: () => ({
    prom: [
      {
        name: "1",
        image: bigpic1,
        title: "Everyday Fresh & Clean with our Product",
        bg: "bg-green-300",
        color:"bg-[#F0E8D5]",
  
      },
      {
        name: "2",
        image: bigpic2,
        title: "Make your Breakfast Easy and Healthy",
        bg: "bg-green-300",
        color: "bg-[#F3E8E8]",
  
      },
      {
        name: "3",
        image: bigpic3,
        title: "The best Organic Product Online",
        bg: "bg-yellow-300",
        color: "bg-[#E7EAF3]",
  
      },
    ],
    categories: [
      {
        id: "1",
        name: 'Cake & Milk',
        imageUrl: img1,
        description: '14 items',
        bg: "bg-[#F2FCE4] border-2 hover:border-[#81B13D]",
      },
      {
        id: "2",
        name: 'Peach',
        imageUrl: img2,
        description: '17 items',
        bg: "bg-[#FFFCEB]",
      },
      {
        id: "3",
        name: 'Oganic Kiwi',
        imageUrl: img3,
        description: '21 items',
        bg: "bg-[#ECFFEC]",
      },
      {
        id: "4",
        name: 'Red apples',
        imageUrl: img4,
        description: '68 items',
        bg: "bg-[#FEEFEA]",
      },
      {
        id: '5',
        name: 'Snack',
        imageUrl: img5,
        description: '34 items',
        bg: "bg-[#FFF3EB]",
      },
      {
        id: '6',
        name: 'Black plum',
        imageUrl: img6,
        description: '25 items',
        bg: "bg-[#FFF3FF]",
      },
      {
        id: '7',
        name: 'Vegetable',
        imageUrl: img7,
        description: '65 items',
        bg: "bg-[#F2FCE4]",
      }, 
      {
        id: '8',
        name: 'Headphone',
        imageUrl: img8,
        description: '33 items',
        bg: "bg-[#FFFCEB]",
      },
      {
        id: '9',
        name: 'Cake & Milk',
        imageUrl: img9,
        description: '54 items',
        bg: "bg-[#F2FCE4]"
      },
      {
        id: '10',
        name: 'Orange',
        imageUrl: img10,
        description: '10 items',
        bg: "bg-[#FFF3FF]"
      },
    ],
    products: [
      {        
        id: 1,        
        tag: "-17%",       
        image: Pimg1,        
        category: 3,        
        name: "Seeds of Change Organic Quinoa, Brown, & Red Rice",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.57",
        buy: "1", 
        color: "bg-green-400",
       
      },
      {        
        id: 2,        
        tag: "Hot",       
        image: Pimg2,        
        category: 3,        
        name: "All Natural Itlalian-Style Chicken MeatBalls",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.51",
        buy: "0",
        color: "bg-red-400"
      },   
      {        
        id: 3,        
        tag: "Sale",       
        image: Pimg3,        
        category: 3,        
        name: "Angie's Boomchickapop Sweet & Salty Kettle Corn",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.57",
        buy: "0",
        color: "bg-yellow-400"
      },
      {        
        id: 4,        
        tag: "",       
        image: Pimg4,        
        category: 3,        
        name: "Foster Farms Takeout Crispy Classic Buffalo Wings",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.57",
        buy: "0",
      },
      {        
        id: 5,        
        tag: "0",       
        image: Pimg5,        
        category: 3,        
        name: "Blue Diamond Almonds Lightly Salted Vegetable",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.57",
        buy: "0",
      },
      {        
        id: 6,        
        tag: "",       
        image: Pimg6,        
        category: 3,        
        name: "Chobani Complete Valnilla Greek Yougurt",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.51",
        buy: "0",
      },
      {        
        id: 7,        
        tag: "Sale",       
        image: Pimg7,        
        category: 3,        
        name: "Canada Dry Ginger Ale - 2 L Bottle - 200ml - 400g",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.51",
        buy: "0",
        color: "bg-yellow-400",
      },
      {        
        id: 8,        
        tag: "",       
        image: Pimg8,        
        category: 3,        
        name: "Encore Seafood Stuffed Alaskan Salmon",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.51",
        buy: "0",
      },
      {        
        id: 9,        
        tag: "",       
        image: Pimg9,        
        category: 3,        
        name: "Gorton's Beer Battered Fish Fillets with soft paper",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.57",
        buy: "0",
      },
      {        
        id: 10,        
        tag: "Hot",       
        image: Pimg10,        
        category: 3,        
        name: "Haagen-Dazs Caramel Cone Ice Cream Ketchup",        
        rate: 4,        
        description: "500 gram",       
        sellPrice: "2.80",        
        discountPercentage: 17,       
        discountPrice: "2.51",
        buy: "0",
        color: "bg-red-400"
      },
    
    ],
    groups:["Milks & Dairies", "Coffes & Teas", "Pet Foods" , "Meats" , "Vegetables" , "Fruits" ],
  
    Menuitems: [
      {
        title: "Account",
        icon: "user",
        type: "header"
      },
      {
        title: "Compare",
        icon: "rotate",
        type: "header"
      },
      {
        title: "Wishlist",
        icon: "heart",
        type: "header"
      },
      {
        title: "Cart",
        icon: "cart-shopping",
        type: "header"
      },
    ],

    ListItem: [
      {
        title: "Home",
        
      },
      {
        title: "Food",
        icon: "chevron-down",
      },
      {
        title: "Vegetable",
        icon: "chevron-down",
      }
      ,
      {
        title: "Drink",
      },
      {
        title: "Cookies",
      },
      {
        title: "Meat & Seafood",
        icon: "chevron-down"
      },
      {
        title: "Bakery",

      }
      

    ]
    



  }),
})