const app = Vue.createApp({
    //data, functions
    //template: '<h2>this is a template in the vue app</h2>'
    data(){//function to return object
        return{
            url:'https://www.google.com',
            showBooks:true,
            title:'The Final Empire',
            author: 'Brandon Sanderson',
            age: 45,
            x: 0,
            y: 0,
            books:[
                {title: 'name of the wind', author: 'patrick rothfus', img: 'assets/1.jpeg', isFav: true},
                {title: 'the way of the kinds', author: 'brandon sanderson', img: 'assets/2.png', isFav: false},
                {title: 'the final empire', author: 'brandon sanderson', img: 'assets/3.jpg', isFav: true},

            ]
        }
    },
    methods:{
        toggleShowBooks(){
            this.showBooks = !this.showBooks
        },
        handleEvent(e, data){
            console.log(e)
            if(data){
                console.log(data)
            }
        },
        handleMouseMove(e){
            this.x = e.offsetX
            this.y = e.offsetY
        },
        toggleFavBook(book){
            book.isFav = !book.isFav
        }
        // changeTitle(title){
        //     // this.title = 'Words of Radiance'
        //     this.title = title
        // }
    },
    computed: {
        filteredBooks(){
            return this.books.filter((book) => book.isFav)
        }
    }
})

app.mount('#app')