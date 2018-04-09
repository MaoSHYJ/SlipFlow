# SlipFlow
Architecture applied to PHP where MVC is reinvented like the wheel.

## View
Templates and modules are divided by its action with the information.

OUT modules must show desired information, preventing leaks.
IN modules must secure the information introduced by the users.
INOUT modules are interactive modules where the user would introduce and recive information.

## Controller
OUT controller must prevent leaks of inormation.
IN controller must filter the information that comes from the view.
INOUT wouldapply IN and OUT filters of information.
