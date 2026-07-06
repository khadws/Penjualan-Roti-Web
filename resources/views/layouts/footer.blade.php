<style>
    .footer {
        box-shadow: 2px 0px 10px black;
    }
</style>
@if(isset($footer))
<section class="footer w-full px-[50px] py-[50px] flex justify-between mt-15 z-10 mt-7 bg-[#E3AC84] ">
    <div class="w-[350px] flex flex-col">
        <div class="footer-contact">
            <h2 class="mb-[20px] text-[24px] text-black font-semibold">{{$footer->nama_toko}}</h2>
            <p>{{$footer->deskripsi_toko}}</p>
        </div>
    </div>

    <div class="text-black my-[5px] flex flex-col">
        <h2 class="font-bold text-black mb-[13px] text-[20px]">Learn More</h2>
        <a href="about">Tentang Kami</a>
        <a href="#">Butuh Bantuan</a>
    </div>

    <div class="w-[300px] text-black my-[5px] flex flex-col ">
      <h2 class="font-bold text-black mb-[13px] text-[20px]">Contact Us</h2>
        <div class="flex text-center my-[10x]">         
          <a href="https://wa.me/6287855751171" id="phone" aria-label="phone" class="flex text-center text-black">
              <i class="feather-phone" data-feather="phone"></i>
              <p class="ml-[10px]">{{$footer->nomor_toko}}</p> 
          </a> 
        </div>
      
        <div class="flex text-center my-[10x]">
          <a href="#" id="mail" aria-label="mail" class="flex text-center text-black">
              <i class="feather-mail" data-feather="mail"></i>
              <p class="ml-[10px]">{{$footer->email_toko}}</p> 
          </a>
        </div>
    </div>
  
    <div class="w-[170px] text-black my-[5px] flex flex-col ">
        <h2 class="font-bold text-black mb-[13px] text-[20px]">Social</h2>
        <div class="flex">
          <a href="{{$footer->link_instagram}}" id="instagram" class="flex justify-center mt-[10px] mr-[10px]" aria-label="instagram">
            <i class="feather-instagram" data-feather="instagram"></i>
          </a>
          <a href="{{$footer->link_youtube}}" id="youtube" class="flex justify-center mt-[10px] mr-[10px]" aria-label="youtube">
            <i class="feather-youtube" data-feather="youtube"></i>
          </a>
        </div>
    </div>
</section>
<script>
    feather.replace();
</script>
@endif