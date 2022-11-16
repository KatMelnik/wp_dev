//Scss
import '../css/style.scss';


/*let reqScss = require.context("../css/gutenberg_block", true, /^(.*\.(scss$))[^.]*$/im);
reqScss.keys().forEach(reqScss);*/


//JS
import './libs';
import './gamma';

//import './cookie';
//Import components
//import 'components/popup'

//Import library
var reqLibraryJs = require.context("./components/library", true, /^(.*\.(js$))[^.]*$/im);
reqLibraryJs.keys().forEach(reqLibraryJs);

//Import blocks
var reqJs = require.context("./components", false, /^(.*\.(js$))[^.]*$/im);
reqJs.keys().forEach(reqJs);



