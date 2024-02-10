<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-12 half-card">
        <h3>ВОПРОСЫ - ОТВЕТЫ</h3>
          <div class="accordion" id="accordionExample">
              @foreach($faqs as $faq)
              <div class="accordion-item">
                  <h2 class="accordion-header">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$faq->id}}" aria-expanded="false" aria-controls="collapse{{$faq->id}}">
                          {{$faq->qwest}}
                      </button>
                  </h2>
                  <div id="collapse{{$faq->id}}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                      <div class="accordion-body">
                          {{$faq->information}}
                      </div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
</div>


<style>
.accordion-button:not(.collapsed) {
    background-color: transparent !important;
    color: #000 !important; /* Цвет текста активного заголовка */
    border-color: transparent !important;
}
</style>
