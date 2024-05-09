<x-layout>
    <div class="profile-create">
     <form class="survey-form" method="POST" action="/survey/store">
         @csrf
              <!-- Section 1: General Information -->
            @include('pages.survey-form.sections.section1')
               <!-- Section 2: Farming Practices and Challenges -->
             @include('pages.survey-form.sections.section2')
             @include('pages.survey-form.sections.section3')
             @include('pages.survey-form.sections.section4')
             @include('pages.survey-form.sections.section5')
             @include('pages.survey-form.sections.section6')
 
         </form>
     </div>
 
 
     
     
     <script>
         let currentSection = 1;
     
         function nextSection() {
             const currentSectionId = `section${currentSection}`;
             const nextSectionId = `section${currentSection + 1}`;
             const currentSectionElement = document.getElementById(currentSectionId);
             const nextSectionElement = document.getElementById(nextSectionId);
     
             if (currentSectionElement && nextSectionElement) {
                 currentSectionElement.classList.remove('current-section');
                 nextSectionElement.classList.add('current-section');
                 currentSection++;
             }
             event.preventDefault();  
         }
     
         function prevSection() {
             const currentSectionId = `section${currentSection}`;
             const prevSectionId = `section${currentSection - 1}`;
             const currentSectionElement = document.getElementById(currentSectionId);
             const prevSectionElement = document.getElementById(prevSectionId);
     
             if (currentSectionElement && prevSectionElement && currentSection > 1) {
                 currentSectionElement.classList.remove('current-section');
                 prevSectionElement.classList.add('current-section');
                 currentSection--;
             }
             event.preventDefault();  
         }
     
         async function submitForm() {
             const form = document.querySelector('.survey-form');
             const formData = new FormData(form);
     
             try {
                 const response = await fetch(form.action, {
                     method: form.method,
                     headers: {
                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                     },
                     body: formData,
                 });
     
                 if (!response.ok) {
                     const message = `An error has occurred: ${response.status}`;
                     throw new Error(message);
                 }
     
                 window.location.href = '/';
             } catch (error) {
                 console.error('Form submission error:', error);
             }
         }
     
        
         document.querySelector('.survey-form .submit-button').addEventListener('click', submitForm); 
     </script>
         <script>
            // Get all the checkbox groups
let checkboxGroups = document.querySelectorAll('.checkbox-group');

// Apply the logic to each group separately
checkboxGroups.forEach(function(group) {
    // Get all the checkboxes in the current group
    let checkboxes = group.querySelectorAll('input[type="checkbox"]');

    // Add event listener to each checkbox
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // If 'None of the Above' is checked, uncheck all other checkboxes
            if (this.value === 'none' && this.checked) {
                checkboxes.forEach(function(c) {
                    if (c.value !== 'none') {
                        c.checked = false;
                    }
                });
            }
            // If another checkbox is checked, uncheck 'None of the Above'
            else if (this.value !== 'none' && this.checked) {
                checkboxes.forEach(function(c) {
                    if (c.value === 'none') {
                        c.checked = false;
                    }
                });
            }
        });
    });
});

         </script>
     
 </x-layout>