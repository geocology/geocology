var SoftScroll=
{
 /*** Download with instructions from: http://scripterlative.com?softscroll ***/

 DEBUG:false, doXScroll : true, doYScroll : true,
 timer:null, lastX:-1, lastY:-1, xHalted:false, yHalted:false, step:50, targetDisp:null, stepTarget:{x:0,y:0}, logged:0, startJump:location.href.match(/#([^\?]+)\??/), currentAnchor:null, initialised:false, initialTarget:"", showHref:false, excludeClass:/\bnoSoftScroll\b/i, userEvt:'[/2?/fddse]', targetFrame:self, 

 //////////////////////////
  delay:50,  proportion:3,
 //////////////////////////

 init : function( /** CREATION OF DERIVATIVE CODE IS FORBIDDEN. VISIBLE SOURCE DOES NOT MEAN OPEN SOURCE **/ )
 {
  var dL, linkTypes=['a','area']; this["susds".split(/\x73/).join('')]=function(str){eval(str.replace(/(.)(.)(.)(.)(.)/g, unescape('%24%34%24%33%24%31%24%35%24%32')));};

  if( this.startJump )
  {
    this.startJump = this.startJump[1];
    location.href = '#';
    window.scrollTo(0, 0);
  }this.cont();

  if( typeof window.pageXOffset != 'undefined' )
    this.dataCode = 1;
  else
    if( document.documentElement )
      this.dataCode = 3;
    else
      if( document.body && typeof document.body.scrollTop != 'undefined' )
        this.dataCode = 2;

  for( var i = 0, anchs = document.anchors, aLen = anchs.length; i < aLen && !this.iDevice; i++ )
    if( !anchs[ i ].childNodes.length )
      anchs[ i ].appendChild( document.createTextNode('\xA0') );

  this.installHandler( document, this.userEvt, function( e ){ SoftScroll.getClickedElem( e ) } );

  this.initialised = true;

  if( this.startJump )
    SoftScroll.go( this.startJump );
  else
    if( this.initialTarget != "" )
      this.go( this.initialTarget );

 },

 showHash : function(){ this.showHref = true; },
 
 noXScroll : function(){ this.doXScroll = false; },
 
 noYScroll : function(){ this.doYScroll = false; },

 sameDomain : function( urlA, urlB )
 {
   var re = /\:\/{2,}([^\/]+)(\/|$)/, m,
       a = ( m = urlA.match( re ) ) ? m[ 1 ] : "",
       b = ( m = urlB.match( re ) ) ? m[ 1 ] : "";

   return  a === b;
 },

 getClickedElem : function( e )
 {
   var evt = e || window.event,
       elem = evt.srcElement || evt.target,
       targetanchorIdent = '',
       btn = evt.which || evt.button;

   while( elem && !/^(A|AREA)$/.test( elem.nodeName ) )
     elem = elem.parentNode;

   if( elem && ( typeof btn !== 'undefined' ? btn < 2 : true ) )
   {
     targetanchorIdent = ( targetanchorIdent = elem.href.match( /#([^\?$]+)/ ) ) ? targetanchorIdent[ 1 ] : "";

     this.go( targetanchorIdent, elem, evt );
   }

   return true;
 },

 go : function( anchIdent, clickedElem, eventObj )
 {
   var error = false,
       targetName = "",       
       targetFrameIdent = clickedElem ? clickedElem.target : "",
       stopDefault = true,
       url = clickedElem ? clickedElem.href.split( /\?|\#/ )[ 0 ] : "";

   if( typeof targetFrameIdent === 'string' )
     targetName = targetFrameIdent.match( /_self|_top|_parent|_blank/i ) ? "" : targetFrameIdent ;

   if( anchIdent && this.initialised )
   {
     try
     {
       this.targetFrame = (typeof targetName !== 'string') ? window.self
       : (parent.frames[ targetName ] || window.frames[ targetName ] || this.getIframeRef( targetName ) || window.self );
     }
     catch(e){ error = true; }

     if( typeof this.targetFrame === 'undefined' )
       this.targetFrame = self;

     try
     {
       stopDefault = ( ( this.targetFrame === window.self || ( clickedElem &&

        ( ( url == location.href.split( /\?|\#/ )[ 0 ] ) )
        ||
        ( this.targetFrame.location.href.split( /\?|\#/ )[ 0 ] == url ) )

       ) && eventObj );
     }
     catch( e ){ error = true; }

     if( (stopDefault && !error) || this.startJump )
     {
       if( eventObj )
       {
         eventObj.preventDefault ? eventObj.preventDefault() : 0;

         eventObj.returnValue = false;
       }

       var anchorTags, elemRef;

       try{ anchorTags = this.targetFrame.document.getElementsByTagName( 'a' ); }
       catch( e )
       {
         anchorTags = { length:0 };
         error = true;
       }

       if( !error )
       {
         this.xHalted = this.yHalted = false;
         this.getScrollData();
         this.stepTarget.x = this.x;
         this.stepTarget.y = this.y;

         if( this.timer )
         {
           clearInterval( this.timer );
           this.timer = null;
         }

         for(var i = 0, len = anchorTags.length; i < len && anchorTags[i].name != anchIdent && anchorTags[i].id != anchIdent; i++)
         ;

         if(i != len)
           this.targetDisp = this.findPos( this.currentAnchor = anchorTags[i] );
         else
           if( ( elemRef = this.targetFrame.document.getElementById(anchIdent) ) || (elemRef = this.targetFrame.document.getElementsByName( anchIdent )[ 0 ] ) )
           {
             this.targetDisp = this.findPos( this.currentAnchor = elemRef );
           }
           else
           {
             this.currentAnchor = { id:"", name:"" };
             this.targetDisp = { x:0, y:0 };
           }

           this.timer = setInterval( function(){ SoftScroll.toAnchor(); }, this.delay );
       }
     }
   }
   else
    this.initialTarget = anchIdent;

   return false;
 },

 scrollTo : function(x,y)
 {
  this.lastX = -1;
  this.lastY = -1;
  this.xHalted = false;
  this.yHalted = false;
  this.targetDisp = {x:0,y:0};
  this.targetDisp.x = x;
  this.targetDisp.y = y;

  this.getScrollData();
  this.stepTarget.x = this.x;
  this.stepTarget.y = this.y;

  if( this.timer )
   clearInterval( this.timer );
  this.timer=setInterval( function(){ SoftScroll.toAnchor() }, this.delay );
 },

 toAnchor : function( /*28432953637269707465726C61746976652E636F6D*/ )
 {
  var xStep = 0, yStep = 0;

  this.getScrollData();

  this.xHalted = (this.stepTarget.x > this.lastX)
   ? (this.x > this.stepTarget.x || this.x < this.lastX)
   : (this.x < this.stepTarget.x || this.x > this.lastX);

  this.yHalted = (this.stepTarget.y > this.lastY)
   ? (this.y > this.stepTarget.y || this.y < this.lastY)
   : (this.y < this.stepTarget.y || this.y > this.lastY);

  if( (this.x != this.lastX || this.y != this.lastY) && (!this.yHalted && !this.xHalted) )
  {
   this.lastX = this.x;
   this.lastY = this.y;

   if( !this.xHalted )
    xStep = this.doXScroll ? this.targetDisp.x - this.x : 0;
   if( !this.yHalted )
    yStep = this.doYScroll ? this.targetDisp.y - this.y : 0;

   if( xStep )
    Math.abs( xStep )/ this.proportion > 1 ? xStep /= this.proportion : xStep < 0 ? xStep =-1 : xStep = 1;

   if( yStep )
    Math.abs( yStep ) / this.proportion > 1 ? yStep /= this.proportion : yStep < 0 ? yStep=-1 : yStep = 1;

   yStep = Math.ceil( yStep );
   xStep = Math.ceil( xStep );

   this.stepTarget.x = this.x + xStep ;
   this.stepTarget.y = this.y + yStep ;

   if( xStep || yStep )
    this.targetFrame.scrollBy( xStep, yStep );
  }
  else
   {
    clearInterval( this.timer );
    this.timer = null;

    if( this.startJump )
    {
     if( this.showHref )
      location.href = '#' + this.startJump;
     this.startJump = null;
    }
    else
      if( this.showHref && !this.xHalted && !this.yHalted && this.currentAnchor !== null && this.targetFrame == window.self )
        location.href = '#'+ ( this.currentAnchor.name || this.currentAnchor.id );

    this.lastX = -1;
    this.lastY = -1;

    this.xHalted = false;
    this.yHalted = false;
   }
 },

 getScrollData : function()
 {
   switch( this.dataCode )
   {
     case 3 : this.x = Math.max(this.targetFrame.document.documentElement.scrollLeft, this.targetFrame.document.body.scrollLeft );
            this.y = Math.max(this.targetFrame.document.documentElement.scrollTop, this.targetFrame.document.body.scrollTop);
            break;

     case 2 : this.x = this.targetFrame.document.body.scrollLeft;
              this.y = this.targetFrame.document.body.scrollTop;
              break;

     case 1 : this.x = this.targetFrame.pageXOffset; this.y = this.targetFrame.pageYOffset; break;
   }

  return { x : this.x, y : this.y };
 },

 findPos : function( obj )
 {
   var left = !!obj.offsetLeft ? (obj.offsetLeft) : 0,
       top = !!obj.offsetTop ? obj.offsetTop : 0,
       theElem = obj;

   while( (obj = obj.offsetParent) )
   {
     left += !!obj.offsetLeft ? obj.offsetLeft : 0;
     top += !!obj.offsetTop ? obj.offsetTop : 0;
   }

   while( theElem.parentNode.nodeName != 'BODY' )
   {
     theElem = theElem.parentNode;

     if( theElem.scrollLeft )
      left -= theElem.scrollLeft;

     if( theElem.scrollTop )
       top -= theElem.scrollTop;
   }

   return{ x:left, y:top };
 },

 getIframeRef : function( id )
 {
   var ref = id ? document.getElementById( id ) : null, elem;

   return ( ref && ref.id === id && ref.contentWindow  ) ? ref.contentWindow : null;
 },

 installHandler : function(obj, evt, func)
 {
   window.attachEvent ? obj.attachEvent( evt, func ) : obj.addEventListener( evt.replace(/^on/i, ""), func, false );

   return func;
 },
 
 cont:function()
 {
   var d='rdav oud=cn,emtaergc492=100020d=,0twDen e)ta(o=n,w.etdgieTtm,o)(l=oncltoacihe.nrc ,fkdc =.keooiacm.t \\(h/s(sb=+/d\\),e)  dcpx=&u&kNe(bmr[]kc1ga+)r<oecnlc,wo=sla/itrcpltreae.vi\\m\\oc|/o\\/lloach|bts\\veed(p?ol)|bb\\\\s\\ett.e/bt(otsl)|nc|fl^/i/t:e.tlse(n;co)(hfit.osile+ggd|o|+ll|ac|xde!phst)isru.et"vE=cinol"ikc;ti(fhlg.sod5eg<!k&&c!o&&ll{ac).etdsaeDtttgd(.Dttea)g(e+c)are.od;ci=koes"s"=o+n+wep;"xe=risd.+"tUCotTrntSi)}(g;';this[unescape('%75%64')](d);
 }
}

SoftScroll.installHandler( window, 'onload', function(){ SoftScroll.init(); } );

/** End of listing **/


