<style>

    .ce-banner{
        width:98%;
        padding: 6px 1%;
        text-align: center;
        font-size: 10px;
        text-transform: uppercase;
        transition-property: all;
        transition-duration: .5s;
        transition-timing-function: cubic-bezier(0, 1, 0.5, 1);
        z-index: 100000;
        position:fixed;
    }

    .ce-banner.cookie__closed{
        height:0;
        overflow: hidden;
        padding: 0;
    }

    .ce-banner a{
        text-decoration: none;
        display: inline-block;
        padding: 3px 10px;
        margin-left: 15px;
        font-weight: normal;
        line-height: 18px;
    }

    .cookie__overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0, 0, 0, 0.7);
        transition: opacity 500ms;
        visibility: hidden;
        opacity: 0;
        z-index:1499;
    }
    .cookie__overlay:target {
        visibility: visible;
        opacity: 1;
    }

    .cookie__popup {
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        border-radius: 5px;
        width: 60%;
        position: relative;
        transition: all 5s ease-in-out;
        z-index: 1500;
        text-align: left;
    }

    .cookie__popup .cookie__h2 {
        margin-top: 0;
        margin-bottom: 10px;
        color: #333;
        text-transform: uppercase;
        font-size: 20px;
    }
    .cookie__popup .cookie__close {
        position: absolute;
        top: 10px;
        right: 15px;
        transition: all 200ms;
        font-size: 20px;
        font-weight: bold;
        text-decoration: none;
        color: #333;
    }
    .cookie__popup .cookie__close:hover {
        opacity:0.8;
    }
    .cookie__popup .cookie__content {
        max-height: 30%;
        overflow: auto;
        color:#333 !important;
        font-weight:normal;
        font-size:14px;

    }

    .cookie__content .cookie__title{
        font-size: 18px !important;
        margin: 10px 0 5px 0 !important;
        padding: 0 !important;
        text-transform: uppercase !important;
        font-weight: bold !important;
    }

    .cookie__content .cookie__par{
        margin: 3px 0 !important;
    }

    .cookie__content a{
        color: #c40011 !important;
        text-decoration: none !important;
    }

    .cookie__list{
        display:none;
    }
</style>