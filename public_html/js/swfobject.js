



<!DOCTYPE html>
<html lang="en" class=" is-copy-enabled emoji-size-boost is-u2f-enabled">
  <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# object: http://ogp.me/ns/object# article: http://ogp.me/ns/article# profile: http://ogp.me/ns/profile#">
    <meta charset='utf-8'>

    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/frameworks-06e4d8f59f5b927f13919c423f40f0888f37f9af7f426e4020948b00b9371059.css" integrity="sha256-BuTY9Z9bkn8TkZxCP0DwiI83+a9/Qm5AIJSLALk3EFk=" media="all" rel="stylesheet" />
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/github-bd0c638c6195e0bb3be91e68f6413a38b76ba79258d13675ca2bada5493cc7a2.css" integrity="sha256-vQxjjGGV4Ls76R5o9kE6OLdrp5JY0TZ1yiutpUk8x6I=" media="all" rel="stylesheet" />
    
    
    <link crossorigin="anonymous" href="https://assets-cdn.github.com/assets/site-429acc2fc05149afec2a05196b3100560f117f753931d0afca46da6e1eeafe39.css" integrity="sha256-QprML8BRSa/sKgUZazEAVg8Rf3U5MdCvykbabh7q/jk=" media="all" rel="stylesheet" />
    
    

    <link as="script" href="https://assets-cdn.github.com/assets/frameworks-f9a40617e5ea71342dc57103554b07a3c1edc88712b04de1a040aed44891a11d.js" rel="preload" />
    
    <link as="script" href="https://assets-cdn.github.com/assets/github-f5464d349a9414253e2367cb098f34bbfaa2a6b964a5ab1b15e2cda86dc66908.js" rel="preload" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta name="viewport" content="width=device-width">
    
    
    <title>swfobject/swfobject.js at master · swfobject/swfobject · GitHub</title>
    <link rel="search" type="application/opensearchdescription+xml" href="/opensearch.xml" title="GitHub">
    <link rel="fluid-icon" href="https://github.com/fluidicon.png" title="GitHub">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
    <meta property="fb:app_id" content="1401488693436528">

      <meta content="https://avatars2.githubusercontent.com/u/630512?v=3&amp;s=400" name="twitter:image:src" /><meta content="@github" name="twitter:site" /><meta content="summary" name="twitter:card" /><meta content="swfobject/swfobject" name="twitter:title" /><meta content="swfobject - An open source Javascript framework for detecting the Adobe Flash Player plugin and embedding Flash (swf) files." name="twitter:description" />
      <meta content="https://avatars2.githubusercontent.com/u/630512?v=3&amp;s=400" property="og:image" /><meta content="GitHub" property="og:site_name" /><meta content="object" property="og:type" /><meta content="swfobject/swfobject" property="og:title" /><meta content="https://github.com/swfobject/swfobject" property="og:url" /><meta content="swfobject - An open source Javascript framework for detecting the Adobe Flash Player plugin and embedding Flash (swf) files." property="og:description" />
      <meta name="browser-stats-url" content="https://api.github.com/_private/browser/stats">
    <meta name="browser-errors-url" content="https://api.github.com/_private/browser/errors">
    <link rel="assets" href="https://assets-cdn.github.com/">
    
    <meta name="pjax-timeout" content="1000">
    

    <meta name="msapplication-TileImage" content="/windows-tile.png">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="selected-link" value="repo_source" data-pjax-transient>

    <meta name="google-site-verification" content="KT5gs8h0wvaagLKAVWq8bbeNwnZZK1r1XQysX3xurLU">
<meta name="google-site-verification" content="ZzhVyEFwb7w3e0-uOTltm8Jsck2F5StVihD0exw2fsA">
    <meta name="google-analytics" content="UA-3769691-2">

<meta content="collector.githubapp.com" name="octolytics-host" /><meta content="github" name="octolytics-app-id" /><meta content="55EA0759:42B9:1EBACA0B:57711500" name="octolytics-dimension-request_id" />
<meta content="/&lt;user-name&gt;/&lt;repo-name&gt;/blob/show" data-pjax-transient="true" name="analytics-location" />



  <meta class="js-ga-set" name="dimension1" content="Logged Out">



        <meta name="hostname" content="github.com">
    <meta name="user-login" content="">

        <meta name="expected-hostname" content="github.com">
      <meta name="js-proxy-site-detection-payload" content="MjVjNmM0Yjk5ODQ0MTdlNDFlYWFhNTkwZjBhMmM3ZmFhZWY5MjdlZjI3MWRiNzdhZjM4Y2Y5ZTVjYTczYjdlMnx7InJlbW90ZV9hZGRyZXNzIjoiODUuMjM0LjcuODkiLCJyZXF1ZXN0X2lkIjoiNTVFQTA3NTk6NDJCOToxRUJBQ0EwQjo1NzcxMTUwMCIsInRpbWVzdGFtcCI6MTQ2NzAyODczN30=">


      <link rel="mask-icon" href="https://assets-cdn.github.com/pinned-octocat.svg" color="#4078c0">
      <link rel="icon" type="image/x-icon" href="https://assets-cdn.github.com/favicon.ico">

    <meta name="html-safe-nonce" content="5ebcc3f80b9a80cc3908381b4b4b9b9ccbc2e0e9">
    <meta content="131de6bf073245d2be1b61356991c8a128d345d3" name="form-nonce" />

    <meta http-equiv="x-pjax-version" content="4abe6fcbbe0b65d677c2ef2c5ecffb2e">
    

      
  <meta name="description" content="swfobject - An open source Javascript framework for detecting the Adobe Flash Player plugin and embedding Flash (swf) files.">
  <meta name="go-import" content="github.com/swfobject/swfobject git https://github.com/swfobject/swfobject.git">

  <meta content="630512" name="octolytics-dimension-user_id" /><meta content="swfobject" name="octolytics-dimension-user_login" /><meta content="1394068" name="octolytics-dimension-repository_id" /><meta content="swfobject/swfobject" name="octolytics-dimension-repository_nwo" /><meta content="true" name="octolytics-dimension-repository_public" /><meta content="false" name="octolytics-dimension-repository_is_fork" /><meta content="1394068" name="octolytics-dimension-repository_network_root_id" /><meta content="swfobject/swfobject" name="octolytics-dimension-repository_network_root_nwo" />
  <link href="https://github.com/swfobject/swfobject/commits/master.atom" rel="alternate" title="Recent Commits to swfobject:master" type="application/atom+xml">


      <link rel="canonical" href="https://github.com/swfobject/swfobject/blob/master/swfobject/swfobject.js" data-pjax-transient>
  </head>


  <body class="logged-out   env-production macintosh vis-public page-blob">
    <div id="js-pjax-loader-bar" class="pjax-loader-bar"></div>
    <a href="#start-of-content" tabindex="1" class="accessibility-aid js-skip-to-content">Skip to content</a>

    
    
    



          <header class="site-header js-details-container" role="banner">
  <div class="container-responsive">
    <a class="header-logo-invertocat" href="https://github.com/" aria-label="Homepage" data-ga-click="(Logged out) Header, go to homepage, icon:logo-wordmark">
      <svg aria-hidden="true" class="octicon octicon-mark-github" height="32" version="1.1" viewBox="0 0 16 16" width="32"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
    </a>

    <button class="btn-link right site-header-toggle js-details-target" type="button" aria-label="Toggle navigation">
      <svg aria-hidden="true" class="octicon octicon-three-bars" height="24" version="1.1" viewBox="0 0 12 16" width="18"><path d="M11.41 9H.59C0 9 0 8.59 0 8c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zm0-4H.59C0 5 0 4.59 0 4c0-.59 0-1 .59-1H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1h.01zM.59 11H11.4c.59 0 .59.41.59 1 0 .59 0 1-.59 1H.59C0 13 0 12.59 0 12c0-.59 0-1 .59-1z"></path></svg>
    </button>

    <div class="site-header-menu">
      <nav class="site-header-nav site-header-nav-main">
        <a href="/personal" class="js-selected-navigation-item nav-item nav-item-personal" data-ga-click="Header, click, Nav menu - item:personal" data-selected-links="/personal /personal">
          Personal
</a>        <a href="/open-source" class="js-selected-navigation-item nav-item nav-item-opensource" data-ga-click="Header, click, Nav menu - item:opensource" data-selected-links="/open-source /open-source">
          Open source
</a>        <a href="/business" class="js-selected-navigation-item nav-item nav-item-business" data-ga-click="Header, click, Nav menu - item:business" data-selected-links="/business /business/features /business/customers /business">
          Business
</a>        <a href="/explore" class="js-selected-navigation-item nav-item nav-item-explore" data-ga-click="Header, click, Nav menu - item:explore" data-selected-links="/explore /trending /trending/developers /integrations /integrations/feature/code /integrations/feature/collaborate /integrations/feature/ship /explore">
          Explore
</a>      </nav>

      <div class="site-header-actions">
            <a class="btn btn-primary site-header-actions-btn" href="/join?source=header-repo" data-ga-click="(Logged out) Header, clicked Sign up, text:sign-up">Sign up</a>
          <a class="btn site-header-actions-btn mr-2" href="/login?return_to=%2Fswfobject%2Fswfobject%2Fblob%2Fmaster%2Fswfobject%2Fswfobject.js" data-ga-click="(Logged out) Header, clicked Sign in, text:sign-in">Sign in</a>
      </div>

        <nav class="site-header-nav site-header-nav-secondary">
          <a class="nav-item" href="/pricing">Pricing</a>
          <a class="nav-item" href="/blog">Blog</a>
          <a class="nav-item" href="https://help.github.com">Support</a>
          <a class="nav-item header-search-link" href="https://github.com/search">Search GitHub</a>
              <div class="header-search scoped-search site-scoped-search js-site-search" role="search">
  <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="/swfobject/swfobject/search" class="js-site-search-form" data-scoped-search-url="/swfobject/swfobject/search" data-unscoped-search-url="/search" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <label class="form-control header-search-wrapper js-chromeless-input-container">
      <div class="header-search-scope">This repository</div>
      <input type="text"
        class="form-control header-search-input js-site-search-focus js-site-search-field is-clearable"
        data-hotkey="s"
        name="q"
        placeholder="Search"
        aria-label="Search this repository"
        data-unscoped-placeholder="Search GitHub"
        data-scoped-placeholder="Search"
        tabindex="1"
        autocapitalize="off">
    </label>
</form></div>

        </nav>
    </div>
  </div>
</header>



    <div id="start-of-content" class="accessibility-aid"></div>

      <div id="js-flash-container">
</div>


    <div role="main" class="main-content">
        <div itemscope itemtype="http://schema.org/SoftwareSourceCode">
    <div id="js-repo-pjax-container" data-pjax-container>
      
<div class="pagehead repohead instapaper_ignore readability-menu experiment-repo-nav">
  <div class="container repohead-details-container">

    

<ul class="pagehead-actions">

  <li>
      <a href="/login?return_to=%2Fswfobject%2Fswfobject"
    class="btn btn-sm btn-with-count tooltipped tooltipped-n"
    aria-label="You must be signed in to watch a repository" rel="nofollow">
    <svg aria-hidden="true" class="octicon octicon-eye" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.06 2C3 2 0 8 0 8s3 6 8.06 6C13 14 16 8 16 8s-3-6-7.94-6zM8 12c-2.2 0-4-1.78-4-4 0-2.2 1.8-4 4-4 2.22 0 4 1.8 4 4 0 2.22-1.78 4-4 4zm2-4c0 1.11-.89 2-2 2-1.11 0-2-.89-2-2 0-1.11.89-2 2-2 1.11 0 2 .89 2 2z"></path></svg>
    Watch
  </a>
  <a class="social-count" href="/swfobject/swfobject/watchers">
    96
  </a>

  </li>

  <li>
      <a href="/login?return_to=%2Fswfobject%2Fswfobject"
    class="btn btn-sm btn-with-count tooltipped tooltipped-n"
    aria-label="You must be signed in to star a repository" rel="nofollow">
    <svg aria-hidden="true" class="octicon octicon-star" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M14 6l-4.9-.64L7 1 4.9 5.36 0 6l3.6 3.26L2.67 14 7 11.67 11.33 14l-.93-4.74z"></path></svg>
    Star
  </a>

    <a class="social-count js-social-count" href="/swfobject/swfobject/stargazers">
      729
    </a>

  </li>

  <li>
      <a href="/login?return_to=%2Fswfobject%2Fswfobject"
        class="btn btn-sm btn-with-count tooltipped tooltipped-n"
        aria-label="You must be signed in to fork a repository" rel="nofollow">
        <svg aria-hidden="true" class="octicon octicon-repo-forked" height="16" version="1.1" viewBox="0 0 10 16" width="10"><path d="M8 1a1.993 1.993 0 0 0-1 3.72V6L5 8 3 6V4.72A1.993 1.993 0 0 0 2 1a1.993 1.993 0 0 0-1 3.72V6.5l3 3v1.78A1.993 1.993 0 0 0 5 15a1.993 1.993 0 0 0 1-3.72V9.5l3-3V4.72A1.993 1.993 0 0 0 8 1zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3 10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zm3-10c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
        Fork
      </a>

    <a href="/swfobject/swfobject/network" class="social-count">
      341
    </a>
  </li>
</ul>

    <h1 class="public ">
  <svg aria-hidden="true" class="octicon octicon-repo" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M4 9H3V8h1v1zm0-3H3v1h1V6zm0-2H3v1h1V4zm0-2H3v1h1V2zm8-1v12c0 .55-.45 1-1 1H6v2l-1.5-1.5L3 16v-2H1c-.55 0-1-.45-1-1V1c0-.55.45-1 1-1h10c.55 0 1 .45 1 1zm-1 10H1v2h2v-1h3v1h5v-2zm0-10H2v9h9V1z"></path></svg>
  <span class="author" itemprop="author"><a href="/swfobject" class="url fn" rel="author">swfobject</a></span><!--
--><span class="path-divider">/</span><!--
--><strong itemprop="name"><a href="/swfobject/swfobject" data-pjax="#js-repo-pjax-container">swfobject</a></strong>

</h1>

  </div>
  <div class="container">
    
<nav class="reponav js-repo-nav js-sidenav-container-pjax"
     itemscope
     itemtype="http://schema.org/BreadcrumbList"
     role="navigation"
     data-pjax="#js-repo-pjax-container">

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/swfobject/swfobject" aria-selected="true" class="js-selected-navigation-item selected reponav-item" data-hotkey="g c" data-selected-links="repo_source repo_downloads repo_commits repo_releases repo_tags repo_branches /swfobject/swfobject" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-code" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M9.5 3L8 4.5 11.5 8 8 11.5 9.5 13 14 8 9.5 3zm-5 0L0 8l4.5 5L6 11.5 2.5 8 6 4.5 4.5 3z"></path></svg>
      <span itemprop="name">Code</span>
      <meta itemprop="position" content="1">
</a>  </span>

    <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
      <a href="/swfobject/swfobject/issues" class="js-selected-navigation-item reponav-item" data-hotkey="g i" data-selected-links="repo_issues repo_labels repo_milestones /swfobject/swfobject/issues" itemprop="url">
        <svg aria-hidden="true" class="octicon octicon-issue-opened" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M7 2.3c3.14 0 5.7 2.56 5.7 5.7s-2.56 5.7-5.7 5.7A5.71 5.71 0 0 1 1.3 8c0-3.14 2.56-5.7 5.7-5.7zM7 1C3.14 1 0 4.14 0 8s3.14 7 7 7 7-3.14 7-7-3.14-7-7-7zm1 3H6v5h2V4zm0 6H6v2h2v-2z"></path></svg>
        <span itemprop="name">Issues</span>
        <span class="counter">12</span>
        <meta itemprop="position" content="2">
</a>    </span>

  <span itemscope itemtype="http://schema.org/ListItem" itemprop="itemListElement">
    <a href="/swfobject/swfobject/pulls" class="js-selected-navigation-item reponav-item" data-hotkey="g p" data-selected-links="repo_pulls /swfobject/swfobject/pulls" itemprop="url">
      <svg aria-hidden="true" class="octicon octicon-git-pull-request" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M11 11.28V5c-.03-.78-.34-1.47-.94-2.06C9.46 2.35 8.78 2.03 8 2H7V0L4 3l3 3V4h1c.27.02.48.11.69.31.21.2.3.42.31.69v6.28A1.993 1.993 0 0 0 10 15a1.993 1.993 0 0 0 1-3.72zm-1 2.92c-.66 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2zM4 3c0-1.11-.89-2-2-2a1.993 1.993 0 0 0-1 3.72v6.56A1.993 1.993 0 0 0 2 15a1.993 1.993 0 0 0 1-3.72V4.72c.59-.34 1-.98 1-1.72zm-.8 10c0 .66-.55 1.2-1.2 1.2-.65 0-1.2-.55-1.2-1.2 0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2zM2 4.2C1.34 4.2.8 3.65.8 3c0-.65.55-1.2 1.2-1.2.65 0 1.2.55 1.2 1.2 0 .65-.55 1.2-1.2 1.2z"></path></svg>
      <span itemprop="name">Pull requests</span>
      <span class="counter">5</span>
      <meta itemprop="position" content="3">
</a>  </span>

    <a href="/swfobject/swfobject/wiki" class="js-selected-navigation-item reponav-item" data-hotkey="g w" data-selected-links="repo_wiki /swfobject/swfobject/wiki">
      <svg aria-hidden="true" class="octicon octicon-book" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M3 5h4v1H3V5zm0 3h4V7H3v1zm0 2h4V9H3v1zm11-5h-4v1h4V5zm0 2h-4v1h4V7zm0 2h-4v1h4V9zm2-6v9c0 .55-.45 1-1 1H9.5l-1 1-1-1H2c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1h5.5l1 1 1-1H15c.55 0 1 .45 1 1zm-8 .5L7.5 3H2v9h6V3.5zm7-.5H9.5l-.5.5V12h6V3z"></path></svg>
      Wiki
</a>

  <a href="/swfobject/swfobject/pulse" class="js-selected-navigation-item reponav-item" data-selected-links="pulse /swfobject/swfobject/pulse">
    <svg aria-hidden="true" class="octicon octicon-pulse" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M11.5 8L8.8 5.4 6.6 8.5 5.5 1.6 2.38 8H0v2h3.6l.9-1.8.9 5.4L9 8.5l1.6 1.5H14V8z"></path></svg>
    Pulse
</a>
  <a href="/swfobject/swfobject/graphs" class="js-selected-navigation-item reponav-item" data-selected-links="repo_graphs repo_contributors /swfobject/swfobject/graphs">
    <svg aria-hidden="true" class="octicon octicon-graph" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M16 14v1H0V0h1v14h15zM5 13H3V8h2v5zm4 0H7V3h2v10zm4 0h-2V6h2v7z"></path></svg>
    Graphs
</a>

</nav>

  </div>
</div>

<div class="container new-discussion-timeline experiment-repo-nav">
  <div class="repository-content">

    

<a href="/swfobject/swfobject/blob/232ce6e024736a3877a61b4343dea0a383bca56d/swfobject/swfobject.js" class="hidden js-permalink-shortcut" data-hotkey="y">Permalink</a>

<!-- blob contrib key: blob_contributors:v21:97e879e88b50550afb9b2de3a2d8ff26 -->

<div class="file-navigation js-zeroclipboard-container">
  
<div class="select-menu branch-select-menu js-menu-container js-select-menu left">
  <button class="btn btn-sm select-menu-button js-menu-target css-truncate" data-hotkey="w"
    title="master"
    type="button" aria-label="Switch branches or tags" tabindex="0" aria-haspopup="true">
    <i>Branch:</i>
    <span class="js-select-button css-truncate-target">master</span>
  </button>

  <div class="select-menu-modal-holder js-menu-content js-navigation-container" data-pjax aria-hidden="true">

    <div class="select-menu-modal">
      <div class="select-menu-header">
        <svg aria-label="Close" class="octicon octicon-x js-menu-close" height="16" role="img" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
        <span class="select-menu-title">Switch branches/tags</span>
      </div>

      <div class="select-menu-filters">
        <div class="select-menu-text-filter">
          <input type="text" aria-label="Filter branches/tags" id="context-commitish-filter-field" class="form-control js-filterable-field js-navigation-enable" placeholder="Filter branches/tags">
        </div>
        <div class="select-menu-tabs">
          <ul>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="branches" data-filter-placeholder="Filter branches/tags" class="js-select-menu-tab" role="tab">Branches</a>
            </li>
            <li class="select-menu-tab">
              <a href="#" data-tab-filter="tags" data-filter-placeholder="Find a tag…" class="js-select-menu-tab" role="tab">Tags</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="branches" role="menu">

        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <a class="select-menu-item js-navigation-item js-navigation-open selected"
               href="/swfobject/swfobject/blob/master/swfobject/swfobject.js"
               data-name="master"
               data-skip-pjax="true"
               rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target js-select-menu-filter-text" title="master">
                master
              </span>
            </a>
        </div>

          <div class="select-menu-no-results">Nothing to show</div>
      </div>

      <div class="select-menu-list select-menu-tab-bucket js-select-menu-tab-bucket" data-tab-filter="tags">
        <div data-filterable-for="context-commitish-filter-field" data-filterable-type="substring">


            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/swfobject/swfobject/tree/2.3-beta+rc1/swfobject/swfobject.js"
              data-name="2.3-beta+rc1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.3-beta+rc1">
                2.3-beta+rc1
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/swfobject/swfobject/tree/2.2/swfobject/swfobject.js"
              data-name="2.2"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.2">
                2.2
              </span>
            </a>
            <a class="select-menu-item js-navigation-item js-navigation-open "
              href="/swfobject/swfobject/tree/2.1/swfobject/swfobject.js"
              data-name="2.1"
              data-skip-pjax="true"
              rel="nofollow">
              <svg aria-hidden="true" class="octicon octicon-check select-menu-item-icon" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M12 5l-8 8-4-4 1.5-1.5L4 10l6.5-6.5z"></path></svg>
              <span class="select-menu-item-text css-truncate-target" title="2.1">
                2.1
              </span>
            </a>
        </div>

        <div class="select-menu-no-results">Nothing to show</div>
      </div>

    </div>
  </div>
</div>

  <div class="btn-group right">
    <a href="/swfobject/swfobject/find/master"
          class="js-pjax-capture-input btn btn-sm"
          data-pjax
          data-hotkey="t">
      Find file
    </a>
    <button aria-label="Copy file path to clipboard" class="js-zeroclipboard btn btn-sm zeroclipboard-button tooltipped tooltipped-s" data-copied-hint="Copied!" type="button">Copy path</button>
  </div>
  <div class="breadcrumb js-zeroclipboard-target">
    <span class="repo-root js-repo-root"><span class="js-path-segment"><a href="/swfobject/swfobject"><span>swfobject</span></a></span></span><span class="separator">/</span><span class="js-path-segment"><a href="/swfobject/swfobject/tree/master/swfobject"><span>swfobject</span></a></span><span class="separator">/</span><strong class="final-path">swfobject.js</strong>
  </div>
</div>


  <div class="commit-tease">
      <span class="right">
        <a class="commit-tease-sha" href="/swfobject/swfobject/commit/73dfbe28226094bfdc4c9e8666ead72e426b93db" data-pjax>
          73dfbe2
        </a>
        <time datetime="2013-05-22T04:30:26Z" is="relative-time">May 21, 2013</time>
      </span>
      <div>
        <img alt="@pipwerks" class="avatar" height="20" src="https://avatars1.githubusercontent.com/u/300566?v=3&amp;s=40" width="20" />
        <a href="/pipwerks" class="user-mention" rel="contributor">pipwerks</a>
          <a href="/swfobject/swfobject/commit/73dfbe28226094bfdc4c9e8666ead72e426b93db" class="message" data-pjax="true" title="Updated minified version to match updated source file">Updated minified version to match updated source file</a>
      </div>

    <div class="commit-tease-contributors">
      <button type="button" class="btn-link muted-link contributors-toggle" data-facebox="#blob_contributors_box">
        <strong>2</strong>
         contributors
      </button>
          <a class="avatar-link tooltipped tooltipped-s" aria-label="pipwerks" href="/swfobject/swfobject/commits/master/swfobject/swfobject.js?author=pipwerks"><img alt="@pipwerks" class="avatar" height="20" src="https://avatars1.githubusercontent.com/u/300566?v=3&amp;s=40" width="20" /> </a>
    <a class="avatar-link tooltipped tooltipped-s" aria-label="jhiswin" href="/swfobject/swfobject/commits/master/swfobject/swfobject.js?author=jhiswin"><img alt="@jhiswin" class="avatar" height="20" src="https://avatars1.githubusercontent.com/u/120998?v=3&amp;s=40" width="20" /> </a>


    </div>

    <div id="blob_contributors_box" style="display:none">
      <h2 class="facebox-header" data-facebox-id="facebox-header">Users who have contributed to this file</h2>
      <ul class="facebox-user-list" data-facebox-id="facebox-description">
          <li class="facebox-user-list-item">
            <img alt="@pipwerks" height="24" src="https://avatars3.githubusercontent.com/u/300566?v=3&amp;s=48" width="24" />
            <a href="/pipwerks">pipwerks</a>
          </li>
          <li class="facebox-user-list-item">
            <img alt="@jhiswin" height="24" src="https://avatars3.githubusercontent.com/u/120998?v=3&amp;s=48" width="24" />
            <a href="/jhiswin">jhiswin</a>
          </li>
      </ul>
    </div>
  </div>

<div class="file">
  <div class="file-header">
  <div class="file-actions">

    <div class="btn-group">
      <a href="/swfobject/swfobject/raw/master/swfobject/swfobject.js" class="btn btn-sm " id="raw-url">Raw</a>
        <a href="/swfobject/swfobject/blame/master/swfobject/swfobject.js" class="btn btn-sm js-update-url-with-hash">Blame</a>
      <a href="/swfobject/swfobject/commits/master/swfobject/swfobject.js" class="btn btn-sm " rel="nofollow">History</a>
    </div>

        <a class="btn-octicon tooltipped tooltipped-nw"
           href="https://mac.github.com"
           aria-label="Open this file in GitHub Desktop"
           data-ga-click="Repository, open with desktop, type:mac">
            <svg aria-hidden="true" class="octicon octicon-device-desktop" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M15 2H1c-.55 0-1 .45-1 1v9c0 .55.45 1 1 1h5.34c-.25.61-.86 1.39-2.34 2h8c-1.48-.61-2.09-1.39-2.34-2H15c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm0 9H1V3h14v8z"></path></svg>
        </a>

        <button type="button" class="btn-octicon disabled tooltipped tooltipped-nw"
          aria-label="You must be signed in to make or propose changes">
          <svg aria-hidden="true" class="octicon octicon-pencil" height="16" version="1.1" viewBox="0 0 14 16" width="14"><path d="M0 12v3h3l8-8-3-3-8 8zm3 2H1v-2h1v1h1v1zm10.3-9.3L12 6 9 3l1.3-1.3a.996.996 0 0 1 1.41 0l1.59 1.59c.39.39.39 1.02 0 1.41z"></path></svg>
        </button>
        <button type="button" class="btn-octicon btn-octicon-danger disabled tooltipped tooltipped-nw"
          aria-label="You must be signed in to make or propose changes">
          <svg aria-hidden="true" class="octicon octicon-trashcan" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M11 2H9c0-.55-.45-1-1-1H5c-.55 0-1 .45-1 1H2c-.55 0-1 .45-1 1v1c0 .55.45 1 1 1v9c0 .55.45 1 1 1h7c.55 0 1-.45 1-1V5c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1zm-1 12H3V5h1v8h1V5h1v8h1V5h1v8h1V5h1v9zm1-10H2V3h9v1z"></path></svg>
        </button>
  </div>

  <div class="file-info">
      7 lines (6 sloc)
      <span class="file-info-divider"></span>
    10.3 KB
  </div>
</div>

  

  <div itemprop="text" class="blob-wrapper data type-javascript">
      <table class="highlight tab-size js-file-line-container" data-tab-size="8">
      <tr>
        <td id="L1" class="blob-num js-line-number" data-line-number="1"></td>
        <td id="LC1" class="blob-code blob-code-inner js-file-line"><span class="pl-c">/*!    SWFObject v2.3.20130521 &lt;http://github.com/swfobject/swfobject&gt;</span></td>
      </tr>
      <tr>
        <td id="L2" class="blob-num js-line-number" data-line-number="2"></td>
        <td id="LC2" class="blob-code blob-code-inner js-file-line"><span class="pl-c">    is released under the MIT License &lt;http://www.opensource.org/licenses/mit-license.php&gt;</span></td>
      </tr>
      <tr>
        <td id="L3" class="blob-num js-line-number" data-line-number="3"></td>
        <td id="LC3" class="blob-code blob-code-inner js-file-line"><span class="pl-c">*/</span></td>
      </tr>
      <tr>
        <td id="L4" class="blob-num js-line-number" data-line-number="4"></td>
        <td id="LC4" class="blob-code blob-code-inner js-file-line">var swfobject=function(){var D=&quot;undefined&quot;,r=&quot;object&quot;,T=&quot;Shockwave Flash&quot;,Z=&quot;ShockwaveFlash.ShockwaveFlash&quot;,q=&quot;application/x-shockwave-flash&quot;,S=&quot;SWFObjectExprInst&quot;,x=&quot;onreadystatechange&quot;,Q=window,h=document,t=navigator,V=false,X=[],o=[],P=[],K=[],I,p,E,B,L=false,a=false,m,G,j=true,l=false,O=function(){var ad=typeof h.getElementById!=D&amp;&amp;typeof h.getElementsByTagName!=D&amp;&amp;typeof h.createElement!=D,ak=t.userAgent.toLowerCase(),ab=t.platform.toLowerCase(),ah=ab?/win/.test(ab):/win/.test(ak),af=ab?/mac/.test(ab):/mac/.test(ak),ai=/webkit/.test(ak)?parseFloat(ak.replace(/^.*webkit\/(\d+(\.\d+)?).*$/,&quot;$1&quot;)):false,aa=t.appName===&quot;Microsoft Internet Explorer&quot;,aj=[0,0,0],ae=null;if(typeof t.plugins!=D&amp;&amp;typeof t.plugins[T]==r){ae=t.plugins[T].description;if(ae&amp;&amp;(typeof t.mimeTypes!=D&amp;&amp;t.mimeTypes[q]&amp;&amp;t.mimeTypes[q].enabledPlugin)){V=true;aa=false;ae=ae.replace(/^.*\s+(\S+\s+\S+$)/,&quot;$1&quot;);aj[0]=n(ae.replace(/^(.*)\..*$/,&quot;$1&quot;));aj[1]=n(ae.replace(/^.*\.(.*)\s.*$/,&quot;$1&quot;));aj[2]=/[a-zA-Z]/.test(ae)?n(ae.replace(/^.*[a-zA-Z]+(.*)$/,&quot;$1&quot;)):0}}else{if(typeof Q.ActiveXObject!=D){try{var ag=new ActiveXObject(Z);if(ag){ae=ag.GetVariable(&quot;$version&quot;);if(ae){aa=true;ae=ae.split(&quot; &quot;)[1].split(&quot;,&quot;);aj=[n(ae[0]),n(ae[1]),n(ae[2])]}}}catch(ac){}}}return{w3:ad,pv:aj,wk:ai,ie:aa,win:ah,mac:af}}(),i=function(){if(!O.w3){return}if((typeof h.readyState!=D&amp;&amp;(h.readyState===&quot;complete&quot;||h.readyState===&quot;interactive&quot;))||(typeof h.readyState==D&amp;&amp;(h.getElementsByTagName(&quot;body&quot;)[0]||h.body))){f()}if(!L){if(typeof h.addEventListener!=D){h.addEventListener(&quot;DOMContentLoaded&quot;,f,false)}if(O.ie){h.attachEvent(x,function aa(){if(h.readyState==&quot;complete&quot;){h.detachEvent(x,aa);f()}});if(Q==top){(function ac(){if(L){return}try{h.documentElement.doScroll(&quot;left&quot;)}catch(ad){setTimeout(ac,0);return}f()}())}}if(O.wk){(function ab(){if(L){return}if(!/loaded|complete/.test(h.readyState)){setTimeout(ab,0);return}f()}())}}}();function f(){if(L||!document.getElementsByTagName(&quot;body&quot;)[0]){return}try{var ac,ad=C(&quot;span&quot;);ad.style.display=&quot;none&quot;;ac=h.getElementsByTagName(&quot;body&quot;)[0].appendChild(ad);ac.parentNode.removeChild(ac);ac=null;ad=null}catch(ae){return}L=true;var aa=X.length;for(var ab=0;ab&lt;aa;ab++){X[ab]()}}function M(aa){if(L){aa()}else{X[X.length]=aa}}function s(ab){if(typeof Q.addEventListener!=D){Q.addEventListener(&quot;load&quot;,ab,false)}else{if(typeof h.addEventListener!=D){h.addEventListener(&quot;load&quot;,ab,false)}else{if(typeof Q.attachEvent!=D){g(Q,&quot;onload&quot;,ab)}else{if(typeof Q.onload==&quot;function&quot;){var aa=Q.onload;Q.onload=function(){aa();ab()}}else{Q.onload=ab}}}}}function Y(){var aa=h.getElementsByTagName(&quot;body&quot;)[0];var ae=C(r);ae.setAttribute(&quot;style&quot;,&quot;visibility: hidden;&quot;);ae.setAttribute(&quot;type&quot;,q);var ad=aa.appendChild(ae);if(ad){var ac=0;(function ab(){if(typeof ad.GetVariable!=D){try{var ag=ad.GetVariable(&quot;$version&quot;);if(ag){ag=ag.split(&quot; &quot;)[1].split(&quot;,&quot;);O.pv=[n(ag[0]),n(ag[1]),n(ag[2])]}}catch(af){O.pv=[8,0,0]}}else{if(ac&lt;10){ac++;setTimeout(ab,10);return}}aa.removeChild(ae);ad=null;H()}())}else{H()}}function H(){var aj=o.length;if(aj&gt;0){for(var ai=0;ai&lt;aj;ai++){var ab=o[ai].id;var ae=o[ai].callbackFn;var ad={success:false,id:ab};if(O.pv[0]&gt;0){var ah=c(ab);if(ah){if(F(o[ai].swfVersion)&amp;&amp;!(O.wk&amp;&amp;O.wk&lt;312)){w(ab,true);if(ae){ad.success=true;ad.ref=z(ab);ad.id=ab;ae(ad)}}else{if(o[ai].expressInstall&amp;&amp;A()){var al={};al.data=o[ai].expressInstall;al.width=ah.getAttribute(&quot;width&quot;)||&quot;0&quot;;al.height=ah.getAttribute(&quot;height&quot;)||&quot;0&quot;;if(ah.getAttribute(&quot;class&quot;)){al.styleclass=ah.getAttribute(&quot;class&quot;)}if(ah.getAttribute(&quot;align&quot;)){al.align=ah.getAttribute(&quot;align&quot;)}var ak={};var aa=ah.getElementsByTagName(&quot;param&quot;);var af=aa.length;for(var ag=0;ag&lt;af;ag++){if(aa[ag].getAttribute(&quot;name&quot;).toLowerCase()!=&quot;movie&quot;){ak[aa[ag].getAttribute(&quot;name&quot;)]=aa[ag].getAttribute(&quot;value&quot;)}}R(al,ak,ab,ae)}else{b(ah);if(ae){ae(ad)}}}}}else{w(ab,true);if(ae){var ac=z(ab);if(ac&amp;&amp;typeof ac.SetVariable!=D){ad.success=true;ad.ref=ac;ad.id=ac.id}ae(ad)}}}}}X[0]=function(){if(V){Y()}else{H()}};function z(ac){var aa=null,ab=c(ac);if(ab&amp;&amp;ab.nodeName.toUpperCase()===&quot;OBJECT&quot;){if(typeof ab.SetVariable!==D){aa=ab}else{aa=ab.getElementsByTagName(r)[0]||ab}}return aa}function A(){return !a&amp;&amp;F(&quot;6.0.65&quot;)&amp;&amp;(O.win||O.mac)&amp;&amp;!(O.wk&amp;&amp;O.wk&lt;312)}function R(ad,ae,aa,ac){var ah=c(aa);aa=W(aa);a=true;E=ac||null;B={success:false,id:aa};if(ah){if(ah.nodeName.toUpperCase()==&quot;OBJECT&quot;){I=J(ah);p=null}else{I=ah;p=aa}ad.id=S;if(typeof ad.width==D||(!/%$/.test(ad.width)&amp;&amp;n(ad.width)&lt;310)){ad.width=&quot;310&quot;}if(typeof ad.height==D||(!/%$/.test(ad.height)&amp;&amp;n(ad.height)&lt;137)){ad.height=&quot;137&quot;}var ag=O.ie?&quot;ActiveX&quot;:&quot;PlugIn&quot;,af=&quot;MMredirectURL=&quot;+encodeURIComponent(Q.location.toString().replace(/&amp;/g,&quot;%26&quot;))+&quot;&amp;MMplayerType=&quot;+ag+&quot;&amp;MMdoctitle=&quot;+encodeURIComponent(h.title.slice(0,47)+&quot; - Flash Player Installation&quot;);if(typeof ae.flashvars!=D){ae.flashvars+=&quot;&amp;&quot;+af}else{ae.flashvars=af}if(O.ie&amp;&amp;ah.readyState!=4){var ab=C(&quot;div&quot;);</td>
      </tr>
      <tr>
        <td id="L5" class="blob-num js-line-number" data-line-number="5"></td>
        <td id="LC5" class="blob-code blob-code-inner js-file-line">aa+=&quot;SWFObjectNew&quot;;ab.setAttribute(&quot;id&quot;,aa);ah.parentNode.insertBefore(ab,ah);ah.style.display=&quot;none&quot;;y(ah)}u(ad,ae,aa)}}function b(ab){if(O.ie&amp;&amp;ab.readyState!=4){ab.style.display=&quot;none&quot;;var aa=C(&quot;div&quot;);ab.parentNode.insertBefore(aa,ab);aa.parentNode.replaceChild(J(ab),aa);y(ab)}else{ab.parentNode.replaceChild(J(ab),ab)}}function J(af){var ae=C(&quot;div&quot;);if(O.win&amp;&amp;O.ie){ae.innerHTML=af.innerHTML}else{var ab=af.getElementsByTagName(r)[0];if(ab){var ag=ab.childNodes;if(ag){var aa=ag.length;for(var ad=0;ad&lt;aa;ad++){if(!(ag[ad].nodeType==1&amp;&amp;ag[ad].nodeName==&quot;PARAM&quot;)&amp;&amp;!(ag[ad].nodeType==8)){ae.appendChild(ag[ad].cloneNode(true))}}}}}return ae}function k(aa,ab){var ac=C(&quot;div&quot;);ac.innerHTML=&quot;&lt;object classid=&#39;clsid:D27CDB6E-AE6D-11cf-96B8-444553540000&#39;&gt;&lt;param name=&#39;movie&#39; value=&#39;&quot;+aa+&quot;&#39;&gt;&quot;+ab+&quot;&lt;/object&gt;&quot;;return ac.firstChild}function u(ai,ag,ab){var aa,ad=c(ab);ab=W(ab);if(O.wk&amp;&amp;O.wk&lt;312){return aa}if(ad){var ac=(O.ie)?C(&quot;div&quot;):C(r),af,ah,ae;if(typeof ai.id==D){ai.id=ab}for(ae in ag){if(ag.hasOwnProperty(ae)&amp;&amp;ae.toLowerCase()!==&quot;movie&quot;){e(ac,ae,ag[ae])}}if(O.ie){ac=k(ai.data,ac.innerHTML)}for(af in ai){if(ai.hasOwnProperty(af)){ah=af.toLowerCase();if(ah===&quot;styleclass&quot;){ac.setAttribute(&quot;class&quot;,ai[af])}else{if(ah!==&quot;classid&quot;&amp;&amp;ah!==&quot;data&quot;){ac.setAttribute(af,ai[af])}}}}if(O.ie){P[P.length]=ai.id}else{ac.setAttribute(&quot;type&quot;,q);ac.setAttribute(&quot;data&quot;,ai.data)}ad.parentNode.replaceChild(ac,ad);aa=ac}return aa}function e(ac,aa,ab){var ad=C(&quot;param&quot;);ad.setAttribute(&quot;name&quot;,aa);ad.setAttribute(&quot;value&quot;,ab);ac.appendChild(ad)}function y(ac){var ab=c(ac);if(ab&amp;&amp;ab.nodeName.toUpperCase()==&quot;OBJECT&quot;){if(O.ie){ab.style.display=&quot;none&quot;;(function aa(){if(ab.readyState==4){for(var ad in ab){if(typeof ab[ad]==&quot;function&quot;){ab[ad]=null}}ab.parentNode.removeChild(ab)}else{setTimeout(aa,10)}}())}else{ab.parentNode.removeChild(ab)}}}function U(aa){return(aa&amp;&amp;aa.nodeType&amp;&amp;aa.nodeType===1)}function W(aa){return(U(aa))?aa.id:aa}function c(ac){if(U(ac)){return ac}var aa=null;try{aa=h.getElementById(ac)}catch(ab){}return aa}function C(aa){return h.createElement(aa)}function n(aa){return parseInt(aa,10)}function g(ac,aa,ab){ac.attachEvent(aa,ab);K[K.length]=[ac,aa,ab]}function F(ac){ac+=&quot;&quot;;var ab=O.pv,aa=ac.split(&quot;.&quot;);aa[0]=n(aa[0]);aa[1]=n(aa[1])||0;aa[2]=n(aa[2])||0;return(ab[0]&gt;aa[0]||(ab[0]==aa[0]&amp;&amp;ab[1]&gt;aa[1])||(ab[0]==aa[0]&amp;&amp;ab[1]==aa[1]&amp;&amp;ab[2]&gt;=aa[2]))?true:false}function v(af,ab,ag,ae){var ad=h.getElementsByTagName(&quot;head&quot;)[0];if(!ad){return}var aa=(typeof ag==&quot;string&quot;)?ag:&quot;screen&quot;;if(ae){m=null;G=null}if(!m||G!=aa){var ac=C(&quot;style&quot;);ac.setAttribute(&quot;type&quot;,&quot;text/css&quot;);ac.setAttribute(&quot;media&quot;,aa);m=ad.appendChild(ac);if(O.ie&amp;&amp;typeof h.styleSheets!=D&amp;&amp;h.styleSheets.length&gt;0){m=h.styleSheets[h.styleSheets.length-1]}G=aa}if(m){if(typeof m.addRule!=D){m.addRule(af,ab)}else{if(typeof h.createTextNode!=D){m.appendChild(h.createTextNode(af+&quot; {&quot;+ab+&quot;}&quot;))}}}}function w(ad,aa){if(!j){return}var ab=aa?&quot;visible&quot;:&quot;hidden&quot;,ac=c(ad);if(L&amp;&amp;ac){ac.style.visibility=ab}else{if(typeof ad===&quot;string&quot;){v(&quot;#&quot;+ad,&quot;visibility:&quot;+ab)}}}function N(ab){var ac=/[\\\&quot;&lt;&gt;\.;]/;var aa=ac.exec(ab)!=null;return aa&amp;&amp;typeof encodeURIComponent!=D?encodeURIComponent(ab):ab}var d=function(){if(O.ie){window.attachEvent(&quot;onunload&quot;,function(){var af=K.length;for(var ae=0;ae&lt;af;ae++){K[ae][0].detachEvent(K[ae][1],K[ae][2])}var ac=P.length;for(var ad=0;ad&lt;ac;ad++){y(P[ad])}for(var ab in O){O[ab]=null}O=null;for(var aa in swfobject){swfobject[aa]=null}swfobject=null})}}();return{registerObject:function(ae,aa,ad,ac){if(O.w3&amp;&amp;ae&amp;&amp;aa){var ab={};ab.id=ae;ab.swfVersion=aa;ab.expressInstall=ad;ab.callbackFn=ac;o[o.length]=ab;w(ae,false)}else{if(ac){ac({success:false,id:ae})}}},getObjectById:function(aa){if(O.w3){return z(aa)}},embedSWF:function(af,al,ai,ak,ab,ae,ad,ah,aj,ag){var ac=W(al),aa={success:false,id:ac};if(O.w3&amp;&amp;!(O.wk&amp;&amp;O.wk&lt;312)&amp;&amp;af&amp;&amp;al&amp;&amp;ai&amp;&amp;ak&amp;&amp;ab){w(ac,false);M(function(){ai+=&quot;&quot;;ak+=&quot;&quot;;var an={};if(aj&amp;&amp;typeof aj===r){for(var aq in aj){an[aq]=aj[aq]}}an.data=af;an.width=ai;an.height=ak;var ar={};if(ah&amp;&amp;typeof ah===r){for(var ao in ah){ar[ao]=ah[ao]}}if(ad&amp;&amp;typeof ad===r){for(var am in ad){if(ad.hasOwnProperty(am)){var ap=(l)?encodeURIComponent(am):am,at=(l)?encodeURIComponent(ad[am]):ad[am];if(typeof ar.flashvars!=D){ar.flashvars+=&quot;&amp;&quot;+ap+&quot;=&quot;+at}else{ar.flashvars=ap+&quot;=&quot;+at}}}}if(F(ab)){var au=u(an,ar,al);if(an.id==ac){w(ac,true)}aa.success=true;aa.ref=au;aa.id=au.id}else{if(ae&amp;&amp;A()){an.data=ae;R(an,ar,al,ag);return}else{w(ac,true)}}if(ag){ag(aa)}})}else{if(ag){ag(aa)}}},switchOffAutoHideShow:function(){j=false},enableUriEncoding:function(aa){l=(typeof aa===D)?true:aa},ua:O,getFlashPlayerVersion:function(){return{major:O.pv[0],minor:O.pv[1],release:O.pv[2]}},hasFlashPlayerVersion:F,createSWF:function(ac,ab,aa){if(O.w3){return u(ac,ab,aa)}else{return undefined}},showExpressInstall:function(ac,ad,aa,ab){if(O.w3&amp;&amp;A()){R(ac,ad,aa,ab)}},removeSWF:function(aa){if(O.w3){y(aa)}},createCSS:function(ad,ac,ab,aa){if(O.w3){v(ad,ac,ab,aa)}},addDomLoadEvent:M,addLoadEvent:s,getQueryParamValue:function(ad){var ac=h.location.search||h.location.hash;</td>
      </tr>
      <tr>
        <td id="L6" class="blob-num js-line-number" data-line-number="6"></td>
        <td id="LC6" class="blob-code blob-code-inner js-file-line"><span class="pl-k">if</span>(ac){<span class="pl-k">if</span>(<span class="pl-sr"><span class="pl-pds">/</span><span class="pl-cce">\?</span><span class="pl-pds">/</span></span>.<span class="pl-c1">test</span>(ac)){ac<span class="pl-k">=</span><span class="pl-smi">ac</span>.<span class="pl-c1">split</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>?<span class="pl-pds">&quot;</span></span>)[<span class="pl-c1">1</span>]}<span class="pl-k">if</span>(ad<span class="pl-k">==</span><span class="pl-c1">null</span>){<span class="pl-k">return</span> <span class="pl-en">N</span>(ac)}<span class="pl-k">var</span> ab<span class="pl-k">=</span><span class="pl-smi">ac</span>.<span class="pl-c1">split</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>&amp;<span class="pl-pds">&quot;</span></span>);<span class="pl-k">for</span>(<span class="pl-k">var</span> aa<span class="pl-k">=</span><span class="pl-c1">0</span>;aa<span class="pl-k">&lt;</span><span class="pl-smi">ab</span>.<span class="pl-c1">length</span>;aa<span class="pl-k">++</span>){<span class="pl-k">if</span>(ab[aa].<span class="pl-c1">substring</span>(<span class="pl-c1">0</span>,ab[aa].<span class="pl-c1">indexOf</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>=<span class="pl-pds">&quot;</span></span>))<span class="pl-k">==</span>ad){<span class="pl-k">return</span> <span class="pl-en">N</span>(ab[aa].<span class="pl-c1">substring</span>((ab[aa].<span class="pl-c1">indexOf</span>(<span class="pl-s"><span class="pl-pds">&quot;</span>=<span class="pl-pds">&quot;</span></span>)<span class="pl-k">+</span><span class="pl-c1">1</span>)))}}}<span class="pl-k">return</span><span class="pl-s"><span class="pl-pds">&quot;</span><span class="pl-pds">&quot;</span></span>},<span class="pl-en">expressInstallCallback</span><span class="pl-k">:</span><span class="pl-k">function</span>(){<span class="pl-k">if</span>(a){<span class="pl-k">var</span> aa<span class="pl-k">=</span><span class="pl-en">c</span>(S);<span class="pl-k">if</span>(aa<span class="pl-k">&amp;&amp;</span>I){<span class="pl-smi">aa</span>.<span class="pl-c1">parentNode</span>.<span class="pl-c1">replaceChild</span>(I,aa);<span class="pl-k">if</span>(p){<span class="pl-en">w</span>(p,<span class="pl-c1">true</span>);<span class="pl-k">if</span>(<span class="pl-c1">O</span>.<span class="pl-smi">ie</span>){<span class="pl-c1">I</span>.<span class="pl-c1">style</span>.<span class="pl-c1">display</span><span class="pl-k">=</span><span class="pl-s"><span class="pl-pds">&quot;</span>block<span class="pl-pds">&quot;</span></span>}}<span class="pl-k">if</span>(E){<span class="pl-en">E</span>(B)}}a<span class="pl-k">=</span><span class="pl-c1">false</span>}},version<span class="pl-k">:</span><span class="pl-s"><span class="pl-pds">&quot;</span>2.3<span class="pl-pds">&quot;</span></span>}}();</td>
      </tr>
</table>

  </div>

</div>

<button type="button" data-facebox="#jump-to-line" data-facebox-class="linejump" data-hotkey="l" class="hidden">Jump to Line</button>
<div id="jump-to-line" style="display:none">
  <!-- </textarea> --><!-- '"` --><form accept-charset="UTF-8" action="" class="js-jump-to-line-form" method="get"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /></div>
    <input class="form-control linejump-input js-jump-to-line-field" type="text" placeholder="Jump to line&hellip;" aria-label="Jump to line" autofocus>
    <button type="submit" class="btn">Go</button>
</form></div>

  </div>
  <div class="modal-backdrop js-touch-events"></div>
</div>


    </div>
  </div>

    </div>

        <div class="container site-footer-container">
  <div class="site-footer" role="contentinfo">
    <ul class="site-footer-links right">
        <li><a href="https://status.github.com/" data-ga-click="Footer, go to status, text:status">Status</a></li>
      <li><a href="https://developer.github.com" data-ga-click="Footer, go to api, text:api">API</a></li>
      <li><a href="https://training.github.com" data-ga-click="Footer, go to training, text:training">Training</a></li>
      <li><a href="https://shop.github.com" data-ga-click="Footer, go to shop, text:shop">Shop</a></li>
        <li><a href="https://github.com/blog" data-ga-click="Footer, go to blog, text:blog">Blog</a></li>
        <li><a href="https://github.com/about" data-ga-click="Footer, go to about, text:about">About</a></li>

    </ul>

    <a href="https://github.com" aria-label="Homepage" class="site-footer-mark" title="GitHub">
      <svg aria-hidden="true" class="octicon octicon-mark-github" height="24" version="1.1" viewBox="0 0 16 16" width="24"><path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0 0 16 8c0-4.42-3.58-8-8-8z"></path></svg>
</a>
    <ul class="site-footer-links">
      <li>&copy; 2016 <span title="0.05211s from github-fe141-cp1-prd.iad.github.net">GitHub</span>, Inc.</li>
        <li><a href="https://github.com/site/terms" data-ga-click="Footer, go to terms, text:terms">Terms</a></li>
        <li><a href="https://github.com/site/privacy" data-ga-click="Footer, go to privacy, text:privacy">Privacy</a></li>
        <li><a href="https://github.com/security" data-ga-click="Footer, go to security, text:security">Security</a></li>
        <li><a href="https://github.com/contact" data-ga-click="Footer, go to contact, text:contact">Contact</a></li>
        <li><a href="https://help.github.com" data-ga-click="Footer, go to help, text:help">Help</a></li>
    </ul>
  </div>
</div>



    

    <div id="ajax-error-message" class="ajax-error-message flash flash-error">
      <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"></path></svg>
      <button type="button" class="flash-close js-flash-close js-ajax-error-dismiss" aria-label="Dismiss error">
        <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
      </button>
      Something went wrong with that request. Please try again.
    </div>


      
      <script crossorigin="anonymous" integrity="sha256-+aQGF+XqcTQtxXEDVUsHo8HtyIcSsE3hoECu1EiRoR0=" src="https://assets-cdn.github.com/assets/frameworks-f9a40617e5ea71342dc57103554b07a3c1edc88712b04de1a040aed44891a11d.js"></script>
      <script async="async" crossorigin="anonymous" integrity="sha256-9UZNNJqUFCU+I2fLCY80u/qiprlkpasbFeLNqG3GaQg=" src="https://assets-cdn.github.com/assets/github-f5464d349a9414253e2367cb098f34bbfaa2a6b964a5ab1b15e2cda86dc66908.js"></script>
      
      
      
      
      
      
    <div class="js-stale-session-flash stale-session-flash flash flash-warn flash-banner hidden">
      <svg aria-hidden="true" class="octicon octicon-alert" height="16" version="1.1" viewBox="0 0 16 16" width="16"><path d="M8.865 1.52c-.18-.31-.51-.5-.87-.5s-.69.19-.87.5L.275 13.5c-.18.31-.18.69 0 1 .19.31.52.5.87.5h13.7c.36 0 .69-.19.86-.5.17-.31.18-.69.01-1L8.865 1.52zM8.995 13h-2v-2h2v2zm0-3h-2V6h2v4z"></path></svg>
      <span class="signed-in-tab-flash">You signed in with another tab or window. <a href="">Reload</a> to refresh your session.</span>
      <span class="signed-out-tab-flash">You signed out in another tab or window. <a href="">Reload</a> to refresh your session.</span>
    </div>
    <div class="facebox" id="facebox" style="display:none;">
  <div class="facebox-popup">
    <div class="facebox-content" role="dialog" aria-labelledby="facebox-header" aria-describedby="facebox-description">
    </div>
    <button type="button" class="facebox-close js-facebox-close" aria-label="Close modal">
      <svg aria-hidden="true" class="octicon octicon-x" height="16" version="1.1" viewBox="0 0 12 16" width="12"><path d="M7.48 8l3.75 3.75-1.48 1.48L6 9.48l-3.75 3.75-1.48-1.48L4.52 8 .77 4.25l1.48-1.48L6 6.52l3.75-3.75 1.48 1.48z"></path></svg>
    </button>
  </div>
</div>

  </body>
</html>

