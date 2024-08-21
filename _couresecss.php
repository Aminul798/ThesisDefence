<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="_coursecss.css" rel="stylesheet">

    
</head>

<body style="background-color: 	azure;">
    <?php include '_header.php'; ?>


    <script src="bootstrap/jquery-3.7.1.min.js" ></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="bootstrap/popper.min.js" ></script>

    <div class="wrapper">
      <div class="sidebar">
        <h2>Courses</h2>
        <ul>
          <li><a href="_course.php" >Computer Science</a></li>
          <li><a href="#" >JavaScript</a></li>
          <li><a href="#" >PHP</a></li>
          <li><a href="#" >MySQL</a></li>
          <li><a href="#" >CSS</a></li>
        </ul>
      </div>
      <div class="main_content">
        <div class="header">CSS Video Tutorials</div>

        <div class="container">
          <div class="main-video">
            <div class="video">
              <video src="CourseVideo/CSS/1CSS - Introduction.mp4" controls muted autoplay></video>
              <h3 class="title">0.1 Introduction</h3>
            </div>
          </div>

          <div class="video-list">
            <div class="vid">
            <video src="CourseVideo/CSS/1CSS - Introduction.mp4" muted></video>
            <h3 class="title">0.1 Introduction</h3>
            <p  class="hidetext" hidden>
            What is CSS?
CSS stands for Cascading Style Sheets
CSS describes how HTML elements are to be displayed on screen, paper, or in other media
CSS saves a lot of work. It can control the layout of multiple web pages all at once
External stylesheets are stored in CSS files         CSS Solved a Big Problem
HTML was NEVER intended to contain tags for formatting a web page!

HTML was created to describe the content of a web page, like:

This is a heading

This is a paragraph.

When tags like, and color attributes were added to the HTML 3.2 specification, it started a nightmare for web developers. Development of large websites, where fonts and color information were added to every single page, became a long and expensive process.

To solve this problem, the World Wide Web Consortium (W3C) created CSS.

CSS removed the style formatting from the HTML page! </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/CSS/2CSS - Syntax.mp4" muted></video>
            <h3 class="title">0.2 CSS Syntax</h3>
            <p  class="hidetext" hidden>
            A CSS rule consists of a selector and a declaration block.
            The selector points to the HTML element you want to style.

The declaration block contains one or more declarations separated by semicolons.

Each declaration includes a CSS property name and a value, separated by a colon.

Multiple CSS declarations are separated with semicolons, and declaration blocks are surrounded by curly braces.          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/CSS/3CSS - Simple Selectors.com.mp4" muted></video>
            <h3 class="title">0.3 CSS Selectors</h3>
            <p  class="hidetext" hidden>
            A CSS selector selects the HTML element(s) you want to style.

CSS Selectors
CSS selectors are used to "find" (or select) the HTML elements you want to style.

We can divide CSS selectors into five categories:

Simple selectors (select elements based on name, id, class)
Combinator selectors (select elements based on a specific relationship between them)
Pseudo-class selectors (select elements based on a certain state)
Pseudo-elements selectors (select and style a part of an element)
Attribute selectors (select elements based on an attribute or attribute value)          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/CSS/CSS - How to add CSS to HTML - W3Schools.com.mp4" muted></video>
            <h3 class="title">0.4 How to add CSS to HTML</h3>
            <p  class="hidetext" hidden>When a browser reads a style sheet, it will format the HTML document according to the information in the style sheet.
Three Ways to Insert CSS
There are three ways of inserting a style sheet:
External CSS
Internal CSS
Inline CSS
External CSS
With an external style sheet, you can change the look of an entire website by changing just one file!
Each HTML page must include a reference to the external style sheet file inside the element, inside the head section. Internal CSS
An internal style sheet may be used if one single HTML page has a unique style.
The internal style is defined inside the  element, inside the head section.Inline CSS
An inline style may be used to apply a unique style for a single element.
To use inline styles, add the style attribute to the relevant element. The style attribute can contain any CSS property.</p>
            </div>

            <div class="vid">
            <video src="CourseVideo/CSS/5CSS - Comments - W3Schools.com.mp4" muted></video>
            <h3 class="title">0.5 CSS Comments</h3>
            <p  class="hidetext" hidden>
            CSS comments are not displayed in the browser, but they can help document your source code.

CSS Comments
Comments are used to explain the code, and may help when you edit the source code at a later date.

Comments are ignored by browsers.

A CSS comment is placed inside the style element, and starts with /* and ends with */:          </p>
            </div>

            <div class="vid">
            <video src="CourseVideo/CSS/6CSS - Colors Introduction - W3Schools.com.mp4" muted></video>
            <h3 class="title">0.6 Colors Introduction</h3>
            <p  class="hidetext" hidden>
            Colors are specified using predefined color names, or RGB, HEX, HSL, RGBA, HSLA values.

CSS Color Names
In CSS, a color can be specified by using a predefined color name:    CSS Background Color         CSS Text Color        CSS Border Color  CSS Color Values
In CSS, colors can also be specified using RGB values, HEX values, HSL values, RGBA values, and HSLA values:

Same as color name "Tomato":          </p>
            </div>

            </div>
          </div>

        </div>

        
        


      </div>

      <div class="text">
          <p class="description" style="margin-bottom: 50px;">
          What is CSS?
CSS stands for Cascading Style Sheets
CSS describes how HTML elements are to be displayed on screen, paper, or in other media
CSS saves a lot of work. It can control the layout of multiple web pages all at once
External stylesheets are stored in CSS files         CSS Solved a Big Problem
HTML was NEVER intended to contain tags for formatting a web page!

HTML was created to describe the content of a web page, like:

This is a heading

This is a paragraph.

When tags like  and color attributes were added to the HTML 3.2 specification, it started a nightmare for web developers. Development of large websites, where fonts and color information were added to every single page, became a long and expensive process.

To solve this problem, the World Wide Web Consortium (W3C) created CSS.

CSS removed the style formatting from the HTML page!
          </p>
          <div class="butn" style="background-color: royalblue; padding:20px 40px; display:inline;margin-left:40%; border-radius:10px;">
          <a href="_coursecssquiz.php" style="text-decoration: none; color:white">Give Quiz</a>
        </div>
        </div>

        

        

        


    </div>

    <script type="text/javascript">
      let listVideo=document.querySelectorAll(".video-list .vid");
      let mainVideo=document.querySelector(".main-video video");
      let title=document.querySelector(".main-video .title");
      let hide=document.querySelector(".main-video .hidetext");
      let hidetwo=document.querySelector(".text .description");

      listVideo.forEach(video => {
        video.onclick = () =>{
          listVideo.forEach(vid=> vid.classList.remove("active"));
          video.classList.add("active");
          if(video.classList.contains("active")){
            let src=video.children[0].getAttribute("src");
            mainVideo.src=src;
            let text=video.children[1].innerHTML;
            title.innerHTML=text;
            let hiddentxt=video.children[2].innerHTML;
            hidetwo.innerHTML=hiddentxt;

          }

        }
        
      });
     
    </script>
    
           
    <?php include '_footer.php'; ?>
</body>

</html>
