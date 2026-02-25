import.meta.glob([
  '../images/**',
  '../fonts/**',
]);

import BrandsSlider from './components/BrandsSlider';
import BrandsLogoSlider from './components/BrandsLogoSlider';
import HerozoneSlider from './components/HerozoneSlider';
import PartnersSlider from './components/PartnersSlider';
import NewsSlider from './components/NewsSlider';
import PastEventsSlider from './components/PastEventsSlider';
import ProductsSlider from './components/ProductsSlider';
import PushedCardListSlider from './components/PushedCardListSlider';
import TimelineSlider from './components/TimelineSlider';
import GallerySlider from './components/GallerySlider';
import SimpleSlider from './components/SimpleSlider';
import AjaxFilter from './components/AjaxFilter';
import Lightbox from './components/Lightbox';
import Header from './components/Header';
import DateCountdown from './components/DateCountdown';
import SingleSidebar from './components/SingleSidebar';
import Cursor from './components/Cursor';
import BlocEvents from './components/BlocEvents';
import BlocVideo from './components/BlocVideo';

document.addEventListener('DOMContentLoaded', () => {
  BrandsSlider.init();
  BrandsLogoSlider.init();
  PartnersSlider.init();
  HerozoneSlider.init();
  ProductsSlider.init(); 
  PushedCardListSlider.init();
  TimelineSlider.init();
  GallerySlider.init();
  SimpleSlider.init();
  AjaxFilter.init();
  Lightbox.init();
  Header.init();
  DateCountdown.init();
  SingleSidebar.init();
  NewsSlider.init();
  PastEventsSlider.init();
  Cursor.init();
  BlocVideo.init();
  BlocEvents.init();
});