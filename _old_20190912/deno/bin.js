import { emptyDir, emptyDirSync } from "https://deno.land/std/fs/mod.ts";
import { exists } from "fs";

var options = {
    dirInput:"src",
    dirOutput:"dest",
};

async function findPages(options){
    var pages = [];
    var files = await Deno.readDir(options.dirInput);
    for (var i = 0; i < files.length; i++) {
        var file = files[i];
        if(file.isDirectory()==false){
            return false;
        }
        var dirPage = options.dirInput+"/"+file.name;
        var pageSettings = dirPage+'/page.json';
        if(exists(pageSettings)){
            console.log('Exists');
        }
        // var srcPath = options.dirInput+"/"+file.name;
        // var destPath = options.dirOutput+"/"+file.name;
        // var fileContents = await Deno.readFile(srcPath)
        // console.log(srcPath);
        // console.log(destPath);    
    }
}
async function main (options) {

    var encoder = new TextEncoder("utf-8");
    var decoder = new TextDecoder("utf-8");

    emptyDir(options.dirOutput);
    
    var pages = await findPages(options);

    return;
  
    //var header = await Deno.readFile('./layouts/header.html') 
    
    var header = decoder.decode(await Deno.readFile('./layouts/header.html'))
  
    console.log(header)
  
    await Deno.copyFile("./static/style.css", "./build/style.css");
  
    //var footer = await Deno.readFile('./layouts/footer.html')
  
    var footer = decoder.decode(await Deno.readFile('./layouts/footer.html'))
  
    console.log(footer)
      
    var indexhtml = '<ul>'
  
  
    for (var i = 0; i < files.length; i++) {
  
  
      //source directory
      var data = await Deno.readFile('./src/' + files[i].name)
  
      var parsed = JSON.parse(decoder.decode(data))  
  
      var structure =header + '<h1>' + parsed.title + '</h1>' + '<p class="date">' + parsed.date + '</p>' + '<p>' + parsed.post + '</p>' + footer 
    
      var compiled = encoder.encode(structure)
  
      //destination directory 
      Deno.writeFileSync('./build/' + files[i].name  + ".html", compiled)
    
      var link = '\n<li><a href="' + files[i].name + '.html">' + parsed.title + '</a></li>'
  
      indexhtml = indexhtml + link 
  
      if (i == files.length -1 ){
        indexhtml = header + indexhtml + '</ul>' + footer
        Deno.writeFileSync('./build/index.html', encoder.encode(indexhtml))
  
      console.log('Your retroblog is built.')
      } 
  
    }
  
  }  
  
  main(options)