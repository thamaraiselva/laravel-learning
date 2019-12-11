@extends('layouts.app')

<style>

/*

All grid code is placed in a 'supports' rule (feature query) at the bottom of the CSS (Line 320). 
            
The 'supports' rule will only run if your browser supports CSS grid.

Flexbox is used as a fallback so that browsers which don't support grid will still recieve an identical layout.

*/

/* Base styles */

:root {
    font-size: 10px;
}

*,
*::before,
*::after {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    background-color: #0079bf;
}

.btn {
    display: flex;
    justify-content: center;
    align-items: center;
    font: inherit;
    background: none;
    border: none;
    color: inherit;
    padding: 0;
    cursor: pointer;
}

:focus {
    outline-color: #fa0;
}

/* Masthead */

.masthead {
    flex-basis: 4rem;
    display: flex;
    align-items: center;
    padding: 0 0.8rem;
    background-color: #0067a3;
    box-shadow: 0 0.1rem 0.1rem rgba(0, 0, 0, 0.1);
}

.masthead .btn {
    background-color: #4c94be;
    border-radius: 0.3rem;
    transition: background-color 150ms;
}

.masthead .btn:hover {
    background-color: #3385b5;
}

.boards-menu {
    display: flex;
    flex-shrink: 0;
}

.boards-btn {
    flex-basis: 9rem;
    font-size: 1.4rem;
    font-weight: 700;
    color: #fff;
    margin-right: 0.8rem;
    padding: 0.6rem 0.8rem;
}

.boards-btn-icon {
    font-size: 1.7rem;
    padding-right: 1.2rem;
}

.board-search {
    flex-basis: 18rem;
    position: relative;
}

.board-search-input {
    height: 3rem;
    border: none;
    border-radius: 0.3rem;
    background-color: #4c94be;
    width: 100%;
    padding: 0 3rem 0 1rem;
    color: #fff;
}

.board-search-input:hover {
    background-color: #66a4c8;
}

.search-icon {
    font-size: 1.5rem;
    position: absolute;
    top: 50%;
    right: 0.8rem;
    transform: translateY(-50%) rotate(90deg);
    color: #fff;
}

.logo {
    flex: 1;
    font-family: "Courgette", cursive;
    font-size: 2.2rem;
    font-weight: 700;
    color: rgba(255, 255, 255, 0.5);
    margin: 0 2rem;
    transition: color 150ms;
    text-align: center;
    white-space: nowrap;
    cursor: pointer;
}

.logo:hover {
    color: rgba(255, 255, 255, 0.8);
}

.logo-icon {
    padding-right: 0.4rem;
}

.user-settings {
    display: flex;
    height: 3rem;
    color: #fff;
}

.user-settings-btn {
    font-size: 1.5rem;
    width: 3rem;
    margin-right: 0.8rem;
}

.user-settings-btn:last-of-type {
    margin-right: 0;
}

/* Board info bar */

.board-info-bar {
    flex-basis: 3rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin: 0.8rem 0;
    padding: 0 1rem;
    color: #f6f6f6;
}

.board-controls {
    display: flex;
}

.board-controls .btn {
    margin-right: 1rem;
}

.board-controls .btn:last-of-type {
    margin-right: 0;
}

.board-info-bar .btn {
    font-size: 1.4rem;
    font-weight: 400;
    transition: background-color 150ms;
    padding: 0 0.6rem;
    border-radius: 0.3rem;
    height: 3rem;
}

.board-info-bar .btn:hover {
    background-color: #006aa8;
}

.private-btn-icon,
.menu-btn-icon {
    padding-right: 0.6rem;
    white-space: nowrap;
}

.board-title h2 {
    font-size: 1.8rem;
    font-weight: 700;
    white-space: nowrap;
}

/* Lists */

.lists-container::-webkit-scrollbar {
    height: 2.4rem;
}

.lists-container::-webkit-scrollbar-thumb {
    background-color: #66a3c7;
    border: 0.8rem solid #0079bf;
    border-top-width: 0;
}

.lists-container {
    display: flex;
    align-items: start;
    padding: 0 0.8rem 0.8rem;
    overflow-x: auto;
    height: calc(100vh - 8.6rem);
}

.list {
    flex: 0 0 27rem;
    display: flex;
    flex-direction: column;
    background-color: #e2e4e6;
    max-height: calc(100vh - 11.8rem);
    border-radius: 0.3rem;
    margin-right: 1rem;
}

.list:last-of-type {
    margin-right: 0;
}

.list-title {
    font-size: 1.4rem;
    font-weight: 700;
    color: #333;
    padding: 1rem;
}

.list-items {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-content: start;
    padding: 0 0.6rem 0.5rem;
    overflow-y: auto;
}

.list-items::-webkit-scrollbar {
    width: 1.6rem;
}

.list-items::-webkit-scrollbar-thumb {
    background-color: #c4c9cc;
    border-right: 0.6rem solid #e2e4e6;
}

.list-items li {
    font-size: 1.4rem;
    font-weight: 400;
    line-height: 1.3;
    background-color: #fff;
    padding: 0.65rem 0.6rem;
    color: #4d4d4d;
    border-bottom: 0.1rem solid #ccc;
    border-radius: 0.3rem;
    margin-bottom: 0.6rem;
    word-wrap: break-word;
    cursor: pointer;
}

.list-items li:last-of-type {
    margin-bottom: 0;
}

.list-items li:hover {
    background-color: #eee;
}

.add-card-btn {
    display: block;
    font-size: 1.4rem;
    font-weight: 400;
    color: #838c91;
    padding: 1rem;
    text-align: left;
    cursor: pointer;
}

.add-card-btn:hover {
    background-color: #cdd2d4;
    color: #4d4d4d;
    text-decoration: underline;
}

.add-list-btn {
    flex: 0 0 27rem;
    display: block;
    font-size: 1.4rem;
    font-weight: 400;
    background-color: #006aa7;
    color: #a5cae0;
    padding: 1rem;
    border-radius: 0.3rem;
    cursor: pointer;
    transition: background-color 150ms;
    text-align: left;
}

.add-list-btn:hover {
    background-color: #005485;
}

.add-card-btn::after,
.add-list-btn::after {
    content: '...';
}

/*

The following rule will only run if your browser supports CSS grid.

Remove or comment-out the code block below to see how the browser will fall-back to flexbox styling. 

*/

@supports (display: grid) {
    body {
        display: grid;
        grid-template-rows: 4rem 3rem auto;
        grid-row-gap: 0.8rem;
    }

    .masthead {
        display: grid;
        grid-template-columns: auto 1fr auto;
        grid-column-gap: 2rem;
    }

    .boards-menu {
        display: grid;
        grid-template-columns: 9rem 18rem;
        grid-column-gap: 0.8rem;
    }

    .user-settings {
        display: grid;
        grid-template-columns: repeat(4, auto);
        grid-column-gap: 0.8rem;
    }

    .board-controls {
        display: grid;
        grid-auto-flow: column;
        grid-column-gap: 1rem;
    }

    .lists-container {
        display: grid;
        grid-auto-columns: 27rem;
        grid-auto-flow: column;
        grid-column-gap: 1rem;
    }

    .list {
        display: grid;
        grid-template-rows: auto minmax(auto, 1fr) auto;
    }

    .list-items {
        display: grid;
        grid-row-gap: 0.6rem;
    }

    .logo,
    .list,
    .list-items li,
    .boards-btn,
    .board-info-bar,
    .board-controls .btn,
    .user-settings-btn {
        margin: 0;
    }
}

</style>

@section('main')
    <!-- Masthead -->
<header class="masthead">

<div class="boards-menu">

  <button class="boards-btn btn"><i class="fab fa-trello boards-btn-icon"></i>Boards</button>

  <div class="board-search">
    <input type="search" class="board-search-input" aria-label="Board Search">
    <i class="fas fa-search search-icon" aria-hidden="true"></i>
  </div>

</div>

<div class="logo">

  <h1><i class="fab fa-trello logo-icon" aria-hidden="true"></i>Trello</h1>

</div>

<div class="user-settings">

  <button class="user-settings-btn btn" aria-label="Create">
    <i class="fas fa-plus" aria-hidden="true"></i>
  </button>

  <button class="user-settings-btn btn" aria-label="Information">
    <i class="fas fa-info-circle" aria-hidden="true"></i>
  </button>

  <button class="user-settings-btn btn" aria-label="Notifications">
    <i class="fas fa-bell" aria-hidden="true"></i>
  </button>

  <button class="user-settings-btn btn" aria-label="User Settings">
    <i class="fas fa-user-circle" aria-hidden="true"></i>
  </button>

</div>

</header>
<!-- End of masthead -->


<!-- Board info bar -->
<section class="board-info-bar">

<div class="board-controls">

  <button class="board-title btn">
    <h2>Web Development</h2>
  </button>

  <button class="star-btn btn" aria-label="Star Board">
    <i class="far fa-star" aria-hidden="true"></i>
  </button>

  <button class="personal-btn btn">Personal</button>

  <button class="private-btn btn"><i class="fas fa-briefcase private-btn-icon" aria-hidden="true"></i>Private</button>

</div>

<button class="menu-btn btn"><i class="fas fa-ellipsis-h menu-btn-icon" aria-hidden="true"></i>Show Menu</button>

</section>
<!-- End of board info bar -->

<!-- Lists container -->
<section class="lists-container">

<div class="list">

  <h3 class="list-title">Tasks to Do</h3>

  <ul class="list-items">
    <li>Complete mock-up for client website</li>
    <li>Email mock-up to client for feedback</li>
    <li>Update personal website header background image</li>
    <li>Update personal website heading fonts</li>
    <li>Add google map to personal website</li>
    <li>Begin draft of CSS Grid article</li>
    <li>Read new CSS-Tricks articles</li>
    <li>Read new Smashing Magazine articles</li>
    <li>Read other bookmarked articles</li>
    <li>Look through portfolios to gather inspiration</li>
    <li>Create something cool for CodePen</li>
    <li>Post latest CodePen work on Twitter</li>
    <li>Listen to new Syntax.fm episode</li>
    <li>Listen to new CodePen Radio episode</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">Completed Tasks</h3>

  <ul class="list-items">
    <li>Clear email inbox</li>
    <li>Finalise requirements for client web design</li>
    <li>Begin work on mock-up for client website</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">Topics/Concepts to Revise</h3>

  <ul class="list-items">
    <li>HTML Elements</li>
    <li>HTML Form Validation</li>
    <li>HTML Structured Data</li>
    <li>Advanced CSS Selectors</li>
    <li>CSS Transforms</li>
    <li>CSS Animations</li>
    <li>CSS Flexbox</li>
    <li>CSS Grid</li>
    <li>CSS Methodologies (BEM, SMACSS etc.)</li>
    <li>SASS/SCSS</li>
    <li>Layout Fallbacks</li>
    <li>Responsive Design</li>
    <li>Design Patterns</li>
    <li>JavaScript Fundamentals</li>
    <li>JavaScript OOP</li>
    <li>JavaScript DOM Manipulation</li>
    <li>JavaScript Debugging Techniques</li>
    <li>Node Package Manager</li>
    <li>Grunt/Gulp</li>
    <li>GitHub</li>
    <li>Git Commands</li>
    <li>Web Accessibility</li>
    <li>Web Performance</li>
    <li>Web Hosting</li>
    <li>Browser Dev Tools</li>
    <li>Google Analytics</li>
    <li>Basic Photoshop/Sketch Usage</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">Topics/Concepts to Learn</h3>

  <ul class="list-items">
    <li>HTML 5.2 New Features</li>
    <li>Responsive Images (picture element, srcset/sizes etc.)</li>
    <li>Serverless</li>
    <li>Variable Fonts</li>
    <li>Shadow DOM</li>
    <li>ES6+</li>
    <li>JSON & AJAX</li>
    <li>API's</li>
    <li>JavaScript Patterns</li>
    <li>JavaScript Testing</li>
    <li>jQuery</li>
    <li>SVG</li>
    <li>React JS</li>
    <li>Angular JS</li>
    <li>TypeScript</li>
    <li>Vue JS</li>
    <li>Node JS</li>
    <li>Webpack</li>
    <li>SEO Techniques</li>
    <li>HTML Emails</li>
    <li>WordPress</li>
    <li>Static Site Generators (Jekyll, Hugo, Gatsby etc.)</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">Useful Websites for Learning</h3>

  <ul class="list-items">
    <li>Code Academy</li>
    <li>CodePen</li>
    <li>Codrops</li>
    <li>CSS-Tricks</li>
    <li>Free Code Camp</li>
    <li>Khan Academy</li>
    <li>Lynda</li>
    <li>Medium</li>
    <li>Mozilla Developer Network</li>
    <li>Stack Overflow</li>
    <li>Team Treehouse</li>
    <li>Tuts Plus</li>
    <li>Udemy</li>
    <li>WPSessions</li>
    <li>YouTube</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">Web Dev YouTube Channels</h3>

  <ul class="list-items">
    <li>Adam Khoury</li>
    <li>Brad Hussey</li>
    <li>CSS-Tricks (Chris Coyier)</li>
    <li>Derek Banas</li>
    <li>DevTips (Travis Neilson)</li>
    <li>Free Code Camp</li>
    <li>Fun Fun Function (Mattias Petter Johansson)</li>
    <li>Google Chrome Developers</li>
    <li>Layout Land (Jen Simmons)</li>
    <li>Learn Code Academy</li>
    <li>Level Up Tuts (Scott Tolinski)</li>
    <li>Mackenzie Child</li>
    <li>Rachel Andrew</li>
    <li>The Net Ninja (Shaun Pelling)</li>
    <li>The New Boston (Bucky Roberts)</li>
    <li>Traversy Media (Brad Traversy)</li>
    <li>Wes Bos</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">CodePen Ideas</h3>

  <ul class="list-items">
    <li>Something cool with CSS Grid</li>
    <li>Something cool with CSS Flexbox</li>
    <li>Something cool with CSS animations</li>
    <li>Something cool with CSS gradients</li>
    <li>Something cool with CSS pseudo-elements</li>
    <li>Something cool with SVG</li>
    <li>Something cool with JavaScript</li>
    <li>Something cool with all of the above</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">Practise Website Ideas</h3>

  <ul class="list-items">
    <li>Airsoft/Paintballing Centre</li>
    <li>Bar/Pub</li>
    <li>Bicycle Shop/Repair</li>
    <li>Cafe/Coffee Shop</li>
    <li>Car Showroom/Garage/Repair/Parts</li>
    <li>Construction Company</li>
    <li>Fitness/Gym/Leisure Centre</li>
    <li>Nightclub</li>
    <li>Party Planning Company</li>
    <li>PC Build/Repair Service</li>
    <li>Portfolio/CV</li>
    <li>Real Estate/AirBnB</li>
    <li>Restaurant</li>
    <li>Skiing/Snowboarding Centre/Company</li>
    <li>Streaming Service for Movies/TV</li>
    <li>Streaming Service for Video Games</li>
    <li>Taxi Service</li>
    <li>Travel Agency</li>
    <li>Zoo/Safari Park</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<div class="list">

  <h3 class="list-title">JavaScript Project Ideas</h3>

  <ul class="list-items">
    <li>Analog Clock</li>
    <li>Basic Quiz</li>
    <li>Bill/Cost Splitter</li>
    <li>Countdown Timer</li>
    <li>Form Validator</li>
    <li>Geolocation (Find places near you etc.)</li>
    <li>Gif Search</li>
    <li>Note Taking App</li>
    <li>Random Name Picker</li>
    <li>Secret Message Encoder/Decoder</li>
    <li>Sortable Image Gallery</li>
    <li>Sortable Table</li>
    <li>Tip Calculator</li>
    <li>To-Do List</li>
    <li>Unit Converter</li>
  </ul>

  <button class="add-card-btn btn">Add a card</button>

</div>

<button class="add-list-btn btn">Add a list</button>

</section>
<!-- End of lists container -->
@endsection