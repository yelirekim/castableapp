//
//  CAAppDelegate.h
//  Castable
//
//  Created by Mike Riley on 2/23/18.
//  Copyright © 2018 Panopsis. All rights reserved.
//

#import <UIKit/UIKit.h>
#import <CoreData/CoreData.h>

@interface CAAppDelegate : UIResponder <UIApplicationDelegate>

@property (strong, nonatomic) UIWindow *window;

@property (readonly, strong) NSPersistentContainer *persistentContainer;

- (void)saveContext;


@end

