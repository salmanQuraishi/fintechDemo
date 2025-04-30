@php
    use App\Http\Controllers\LinkedBankRequestController;
    $accountLinks = LinkedBankRequestController::getBankForlinkAccount();
    // dd($accountLinks);
@endphp

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>

    .offcanvas2 {
      position: fixed;
      top: 0;
      right: 0;
      height: 100%;
      width: 400px;
      background-color: #fff;
      box-shadow: -2px 0 8px rgba(0,0,0,0.1);
      transform: translateX(100%);
      opacity: 0;
      visibility: hidden;
      transition: all 0.3s ease;
      z-index: 1050;
    }

    .offcanvas2.show {
      transform: translateX(0);
      opacity: 1;
      visibility: visible;
    }

    .offcanvas-body {
      padding: 1rem;
    }

    .offcanvas-backdrop2 {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      opacity: 0;
      visibility: hidden;
      transition: opacity 0.3s ease;
      z-index: 1040;
    }

    .offcanvas-backdrop2.show {
      opacity: 1;
      visibility: visible;
    }

    .btn-close {
      background: none;
      border: none;
      font-size: 1.5rem;
      color: #999;
      cursor: pointer;
    }

    .btn-close:hover {
      color: #000;
    }

    .modal-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding-bottom: 1rem;
      border-bottom: 1px solid #e0e0e0;
    }
  </style>

  <div class="offcanvas2">
    <div class="offcanvas-body">
      <div class="modal-header">
        <h3 class="text-xl font-bold" style="color: #1A2EFF">Link Your Account</h3>
        <button class="btn-close">&times;</button>
      </div>
      <style>

        .containerModal {
          background: white;
          height: 100vh;
        }
    
        .containerModal h2 {
          color: #1A2EFF;
          font-size: 1.3rem;
          font-weight: 700;
        }
    
        .containerModal .section-title {
          font-weight: 600;
          font-size: 1.1rem;
          margin: 1.5rem 0 1rem;
        }
    
        .containerModal .bank-grid {
          display: flex;
          flex-wrap: wrap;
          gap: 1rem;
        }

        .containerModal .bank-grid2 {
          gap: 1rem;
        }
    
        .containerModal .bank-card {
          flex: 1 1 calc(20% - 1rem);
          background-color: #fff;
          border-radius: 16px;
          padding: 0.7rem;
          text-align: center;
          box-shadow: 0 8px 5px rgba(0,0,0,0.05);
          min-width: 100px;
          transition: transform 0.2s;
        }
    
        .containerModal .bank-card:hover {
          transform: translateY(-3px);
        }
    
        .containerModal .bank-card img {
          max-width: 60px;
        }
    
        .containerModal .bank-card span {
          display: block;
          font-size: 0.9rem;
        }
        .modal-header {
          display: flex;
          justify-content: space-between;
          align-items: center;
        }
    
        .close-btn {
          font-size: 1.7rem;
          font-weight: bold;
          color: #888;
        }
    
      </style>
    
      <div class="containerModal">
        
        <div class="section-title">Select Bank to Link or Open an Account</div>
    
        <div class="bank-grid">
          @foreach ($accountLinks as $linksDetails)
            <div class="bank-card toggle-Banks-Details" data-id="{{$linksDetails->id}}">
              <div style="display: flex;justify-content:center">
                <img src="{{asset('/'.$linksDetails->icon)}}" alt="{{$linksDetails->title}}"/>
              </div>
              <div>
                <p class="text-xs font-bold">{{$linksDetails->title}}</p>
              </div>
            </div>
          @endforeach
    
        </div>
    
                
        <div class="section-title">Banks Going Live Soon</div>
    
        <div class="bank-grid2">
          <div style="display: flex;align-items:center;padding:5px">
            <img src="{{asset('/bank-icon/icon_31197.svg')}}" alt="Kotak Mahindra Bank" width="30px">&nbsp;&nbsp;
            <span>Kotak Mahindra Bank</span>
          </div>
          {{-- <div style="display: flex;align-items:center;padding:5px">
            <img src="{{asset('/bank-icon/icon_31197.svg')}}" alt="Kotak Mahindra Bank" width="30px">&nbsp;&nbsp;
            <span>Kotak Mahindra Bank</span>
          </div> --}}
        </div>
    
      </div>



    </div>
  </div>

  <div class="offcanvas-backdrop2"></div>
  

  @include('modal.showbankDetails')

<script>
  $(document).ready(function () {
    const offcanvas2 = $(".offcanvas2");
    const backdrop2  = $(".offcanvas-backdrop2");

    function openBank() {
      offcanvas2.addClass("show").css({ transform: "translateX(0)", opacity: "1", visibility: "visible" });
      backdrop2.addClass("show").css({ opacity: "1", visibility: "visible" });
    }

    function closeBank() {
      offcanvas2.css({ transform: "translateX(100%)", opacity: "0" });
      backdrop2.css({ opacity: "0" });

      setTimeout(() => {
        offcanvas2.removeClass("show").css("visibility", "hidden");
        backdrop2.removeClass("show").css("visibility", "hidden");
      }, 300);
    }

    $(".toggle-Banks").click(openBank);
    $(".btn-close").click(closeBank);

    $(".toggle-Banks-Details").click(function () {
      const uniqueId = $(this).data("id");
      $("#bankInfoPlaceholder").val(uniqueId);
    });

  });
</script>