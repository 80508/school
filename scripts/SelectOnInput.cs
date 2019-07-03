using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.EventSystems;

public class SelectOnInput : MonoBehaviour {

	public EventSystem eventSystem;	
	public GameObject selectedObject;

	private bool buttonselected;

	// Use this for initialization
	void Start () {

	}

	// Update is called once per frame
	void Update () {

		if (Input.GetAxis ("Vertical") != 0 && buttonselected == false)
		{
			eventSystem.SetSelectedGameObject(selectedObject);
			buttonselected = true;
		}
	}

	private void OnDisable(){
		buttonselected = false;
	}						

}



