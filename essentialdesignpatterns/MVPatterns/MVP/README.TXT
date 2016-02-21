README.txt

Here is a document that focus on telling the characteristics of the MVP patterns.




Introduction:

It originated at a company named Taligent in the early 1990s while they were working on a model for a C++ CommonPoint environment. Whilst both MVC and MVP target the separation of concerns across multiple components, there are some fundamental differences between them.




Difference comparing the MVP pattern to the MVC pattern:

The most common implementation of MVP is one which uses a *Passive* View (a view which is for all intents and purposes "dumb"), containing little to no logic. If MVC and MVP are different it is because the C and P do different things. In MVP, the P observes models and updates views when models change. The P effectively binds models to views, a responsibility which was previously held by controllers in M

MVP have over the MVCis that it increase the testability of our application adn provdies a more clean separation between the view and the model. This isn't however without its costs as the *lack of data binding support* in the pattern can often mean having to take care of this task separately.